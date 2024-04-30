<?php 
session_start();

if ($_SESSION["login_status"] == false) {
    echo "Unauthorized Access 401";
    die;
}

if ($_SESSION["usertype"] != 'Customer') {
    echo 'Forbidden Access 403';
    die;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Customer home welcome you</h1>
</body>
</html>