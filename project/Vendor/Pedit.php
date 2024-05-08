<?php
include 'authguard.php';
include 'menu.html';
include_once '../shared/connection.php';

// Check if the product ID is provided in the URL
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    // Retrieve product details from the database
    $sql_result = mysqli_query($conn, "SELECT * FROM product WHERE pid = $pid");

    if ($sql_result) {
        $product = mysqli_fetch_assoc($sql_result);

        // Handle file upload
        if ($_FILES['Epdtimg']['size'] > 0) {
            $src_path = $_FILES['Epdtimg']['tmp_name'];
            $tgt_path = "../shared/image/" . $_FILES['Epdtimg']['name'];
            move_uploaded_file($src_path, $tgt_path);
        } else {
            $tgt_path = $product['impath']; // Keep the existing image path if no new image is uploaded
        }

        // Update product details in the database
        mysqli_query($conn, "UPDATE product SET name = '$_POST[Ename]', price = '$_POST[Eprice]', impath = '$tgt_path', detail = '$_POST[Edetail]' WHERE pid = $pid");

        echo "Product details updated successfully.";
    } else {
        echo "Error: Product not found.";
    }
} else {
    echo "Error: Product ID not provided.";
}
?>