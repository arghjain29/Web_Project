<?php 

include "authguard.php";
include_once "../shared/connection.php";
include "menu.html";

$cartid = $_GET['cartid'];

$sql = "delete from cart where cartid=$cartid";

$status = mysqli_query($conn, $sql);

if ($status) {
    echo "<script>alert('Product removed from cart')</script>";
    echo "<script>location.href='viewcart.php'</script>";
} else {
    echo "Error in deletion";
}

?>