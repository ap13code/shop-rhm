<?php
if(!isset($_SESSION))
{session_start();}

$servername = "localhost";

$user_name = "root";
$pass_word = "";

$dbname = "shop";

$con = mysqli_connect($servername , $user_name , $pass_word , $dbname);
mysqli_query($con, "SET NAMES utf8");




if($con){
    ?>
    <!-- <div class="alert alert-success"> <?php echo"conected to database"; ?></div> -->
<?php    
}else{
   ?>
   <div class="alert alert-danger"><?php echo "not connected"; ?></div>
   
   <?php
}

?>

<?php


if (isset($_SESSION["username"]) and isset($_SESSION["fingerprint"])) {
 

    $seUserName = $_SESSION['username'];

    $result = mysqli_query($con ,"SELECT * FROM `admin` WHERE `username` LIKE '$seUserName' ");
   
    if( $row = mysqli_fetch_assoc($result)){
        $salt = "124816@P13";
        
        
         $fingerprint2 = md5($row['username'].$row['password'].$salt);
       

        if($_SESSION["fingerprint"] == $fingerprint2){
            //log in
        }else{
    header("Location: login.php?error");
        }
    }
    else{
        header("Location: login.php?error");
    }
}else{
    header("Location: login.php?error");
}
?>