<?php 

$uname=$_POST['username'];
$upass1=$_POST['password1'];
$upass2=$_POST['password2'];
$utype=$_POST['usertype'];

// nEVER TRUST fRONT-END

if ($upass1!=$upass2) {
    echo 'Password Mismatch';
    die;
}

$conn=new mysqli('localhost','root','','web_dev',3306);

$status= mysqli_query($conn, "insert into user(username,password,usertype) values('$uname','$upass1','$utype')");



if ($status){
    echo "<script>alert('User Registered Successfully')</script>";
    echo "<script>location.href='login.html'</script>";
}
else {
    echo mysqli_error($conn);
}
?>