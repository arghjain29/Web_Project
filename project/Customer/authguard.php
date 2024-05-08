<?php
session_start();

// Check if login status is false or usertype is not 'Vendor'
if (!isset($_SESSION["login_status"]) || $_SESSION["login_status"] === false || $_SESSION["usertype"] != 'Customer') {
    echo "Unauthorized Access 401";
    die;
}
?>