<?php
session_start();
// print_r($_FILES['pdtimg']['tmp_name']);



$src_path = $_FILES['pdtimg']['tmp_name'];
$tgt_path = "../shared/image/".$_FILES['pdtimg']['name'];

move_uploaded_file($src_path,$tgt_path);

// $conn = new mysqli('localhost', 'root', '', 'web_dev', 3306);
include_once '../shared/connection.php';

$status = mysqli_query($conn, "insert into product (name,price,detail,impath,owner) values('$_POST[name]','$_POST[price]','$_POST[detail]','$tgt_path','$_SESSION[userID]')");

if($status){
    echo "<script>alert('Product uploaded succesfully')</script>";
} else{
    echo mysqli_error($conn);
}


?>