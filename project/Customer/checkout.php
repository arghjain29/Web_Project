<?php 

include "authguard.php";
include_once "../shared/connection.php";

echo "<script>confirm('Confirm order?')</script>"; 
$sql_result = mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userID]");

$userid=$_SESSION['userID'] ;

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    mysqli_query($conn, "insert into order_list (userid,pid) values ($userid,$dbrow[pid])");
}

echo "<script>alert('Order Confirmed')</script>";
echo "<script>location.href='Torder.php'</script>";

?>