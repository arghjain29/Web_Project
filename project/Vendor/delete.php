<?php 

include 'authguard.php';
include_once '../shared/connection.php';

$pid = $_GET['pid'];

$sql = "delete from product where pid=$pid and owner=$_SESSION[userID]";

if(mysqli_query($conn, $sql))
{
    header('location:view.php');
}
else
{
    echo "Error: ".mysqli_error($conn);
}
?>