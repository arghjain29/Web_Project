<?php
include 'authguard.php';
include 'menu.html';
$pid = $_GET['pid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    h1{
        text-align: center;
        color: blanchedalmond;
        font-family:Georgia, 'Times New Roman', Times, serif ;
    }
    text{
        text-align: center;
        color: blanchedalmond;
        font-family:Georgia, 'Times New Roman', Times, serif ;
        font-size: 25px;
        margin-top: 20px;
    }
    .mt{
        margin-top: 100px;
    }

</style>
<body>
    <div class=" d-flex justify-content-center align-items-center mt">
        <form action="Pedit.php" enctype="multipart/form-data" method="post" class="w-50 bg-success p-4">
            <h1>EDIT PRODUCT HERE</h1>
            <input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>"> <!-- Hidden input for pid -->
            <input required type="text" placeholder="Product name" name="Ename" class="form-control mt-4">
            <input required type="number" placeholder="Product price" name="Eprice" class="form-control mt-2">
            <textarea required name="Edetail" placeholder="Product Description" class="form-control mt-2"></textarea>
            <input required type="file" name="Epdtimg" class="form-control mt-2" accept=".jpg,.png">

            <div class="text-center">
                <button type="submit" class="btn btn-secondary mt-4 justify-content-center"><text>EDIT</text></button>
            </div>  
            
        </form>
    </div>
</body>
</html>

