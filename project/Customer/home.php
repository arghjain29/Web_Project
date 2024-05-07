<?php
session_start();

// Check if login status is false or usertype is not 'Vendor'
if (!isset($_SESSION["login_status"]) || $_SESSION["login_status"] === false || $_SESSION["usertype"] != 'Customer') {
    echo "Unauthorized Access 401";
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