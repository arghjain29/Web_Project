<?php

include "authguard.php";
include_once "../shared/connection.php";

$sql_result = mysqli_query($conn, "select * from order_list where userid=$_SESSION[userID]");
$dbrow = mysqli_fetch_assoc($sql_result);
if ($dbrow==0) {
    echo "<script>alert('NO order Available')</script>";
    echo "<script>location.href='Torder.php'</script>";
    exit();
}
echo "<script>confirm('DO you want to cancel Order ?')</script>";


$status= mysqli_query($conn, "delete from order_list where userid=$_SESSION[userID]");

if ($status) {
    echo "<script>alert('Order Cancelled')</script>";
    echo "<script>location.href='Torder.php'</script>";
} else {
    echo "Error in deletion";
}

?>