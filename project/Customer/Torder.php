<html>
<style>
      .pdt-card {
        background-color: lightpink;
        border: 1px solid black;
        padding: 10px;
        margin: 10px;
        width: 250px;
        display: inline-block;
      }
      .name {
        font-size: 24px;
        font-weight: bold;
        font-family: cursive;
      }
      .price {
        font-size: 26px;
        font-weight: bold;
      }
      .price:before{
        content: "Rs ";
      }
      .pdtimg {
        width: 100%;
        height: 250px;
      }
      .detail {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 2%;
        background-color: lightcoral;
        font-size: 18px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .cancel {
        margin-top: 40px;
        text-align: center;
      }
    </style>
</html>

<?php

include "authguard.php";
include_once "../shared/connection.php";
include "menu.html";

echo "<h1><center>Recent Orders</center></h1>";

$total=0;

$sql_result = mysqli_query($conn, "SELECT * FROM order_list JOIN product ON order_list.pid=product.pid WHERE userid=17");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $total+=$dbrow['price'];

    echo "
    <div class='pdt-card'>
         <div class='name'>$dbrow[name]</div>
         <div class='price'>$dbrow[price]</div>
         <img class='pdtimg' src='$dbrow[impath]'>
         <div class='detail'>$dbrow[detail]</div>
    </div>";

}          
echo "<div class='cancel'>
    <h2>Order Total Amount: Rs $total</h2>
    <a href='Cancel.php'><button class='btn btn-danger mt-2'>Cancel Order</button></a>
  </div>";

?>  