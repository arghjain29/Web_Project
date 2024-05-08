<?php
include 'authguard.php';
include "../shared/connection.php";

$pid=$_GET['pid'];
$userid=$_SESSION['userID'];

$status=mysqli_query($conn, "insert into cart (pid, userid) values ($pid, $userid)");

if ($status) {
    echo "<script>alert('Product added to cart')</script>";
    echo "<script>location.href='home.php'</script>";
}
else {
    echo mysqli_error($conn);
}
?>