<?php

session_start();
$_SESSION["login_status"] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $utype = $_POST['usertype'];

    //HASH password using md5 or SHA
    $cipher_pass= md5($upass);
    
    // $conn = new mysqli('localhost', 'root', '', 'web_dev', 3306);
    include_once 'connection.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user WHERE username='$uname' AND password='$cipher_pass' AND usertype='$utype'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    if ($result && $result->num_rows == 1) {
        echo "Login successful";
        $_SESSION["login_status"] = true;
        $_SESSION["usertype"] = $utype;
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['username'] = $row['username'];

        if ($utype == 'Vendor') {
            header('location:../Vendor/home.php');
        }
        else if ($utype == 'Customer') {
            header('location:../Customer/home.php');
        }
    } else {
        // No matching user
        echo "<script> alert('User Not Found') </script>";
        echo "<script> location.href='login.html' </script>";
    }
    $conn->close();
    
} else {
    header("Location: login.html");
    exit; // Ensure script stops after redirection
}


?>
