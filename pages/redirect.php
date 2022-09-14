<?php


include '../config/config.php';

include '../bootstrap/bs.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password); // for more security

$result= mysqli_query($con , "SELECT * FROM `admin` WHERE `username` LIKE '$username' AND `password` LIKE '$password' ORDER BY adminid");
if($row = mysqli_fetch_assoc($result)){
    // نکته : تا کاربر اطلاعات را درست وارد نکند متغیرهلی جلسه ساخته نمیشوند

    $_SESSION['username'] = $username ;
    $salt = "124816@P13";

    $_SESSION['fingerprint']= md5($username.$password.$salt);
   
    header("Location: ../index.php");   

}else{
header("LOCATION: ../login.php?error");
}


?>