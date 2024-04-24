<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $upass = $_POST['password'];
    $utype = $_POST['usertype'];

    $conn = new mysqli('localhost', 'root', '', 'web_dev', 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user WHERE username='$uname' AND password='$upass' AND usertype='$utype'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        // User found
        echo "Login successful";
        // Additional actions if needed
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
