<?php
session_start();
/* connect to database check user*/
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'LoginReg');

/* create variables to store data */
$name =$_POST['username'];
$pass =$_POST['password'];

/* select data from DB */
$s="select * from userReg where username='$name'";

/* result variable to store data */
$result = mysqli_query($con,$s);

/* check for duplicate names and count records */
$num =mysqli_num_rows($result);
if($num==1){
    echo "Username Exists";
    echo "<meta http-equiv='refresh' content='2;url=login.php'>";
}else{
    $_SESSION['username'] = $name;
    $_SESSION['password'] = $pass;

    // Redirect to registerform.php
    header("Location: registerform.php");
    exit();
}
