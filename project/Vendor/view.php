<html>
  <head>
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

    </style>
  </head>
</html>

<?php 

    include 'authguard.php';
    include_once '../shared/connection.php';
    include 'menu.html';

    $sql_result = mysqli_query($conn, "select * from product where owner=$_SESSION[userID]");


    while ($dbrow= mysqli_fetch_assoc($sql_result))
    {
      
      echo "
      <div class='pdt-card'>
           <div class='name'>$dbrow[name]</div>
           <div class='price'>$dbrow[price]</div>
           <img class='pdtimg' src='$dbrow[impath]'>
           <div class='detail'>$dbrow[detail]</div>
           <div class='action'> 
                <a href='edit.php?pid=$dbrow[pid]'>
                <button>EDIT</button>
                </a>
                <a href='delete.php?pid=$dbrow[pid]'>
                <button>DELETE</button> 
                </a>
           </div>
      </div>";
    }

?>