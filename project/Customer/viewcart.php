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
      .checkout {
        margin-top: 40px;
        text-align: center;
      }
    </style>
</html>

<?php 

include "authguard.php";
include_once "../shared/connection.php";
include "menu.html";

$total=0;
$sql_result = mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userID]");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
  $total+=$dbrow['price'];
    echo "
      <div class='pdt-card'>
           <div class='name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price]</div>
           <img class='pdtimg' src='$dbrow[impath]'>
           <div class='detail'>$dbrow[detail]</div>
           <div class='action text-center mt-2'> 
               <a href='deletecart.php?cartid=$dbrow[cartid]'>
                    <button class='btn btn-danger'>Remove from Cart</button> 
               </a> 
           </div>
      </div>";
}
echo "<div class='checkout'>
        <h2>Total Amount: Rs $total</h2>
        <a href='checkout.php'><button class='btn btn-primary mt-2'>Checkout</button></a>
      </div>";
?>