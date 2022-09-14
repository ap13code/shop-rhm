
<?php
if(!isset($_SESSION))
{session_start();}
// include './config/config.php';
include './bootstrap/bs.php';

?>

<?php
if(isset($_GET['exit'])){
  unset($_SESSION['username']);
  unset($_SESSION['fingerprint']);
}



$error_msg = "نام کاربری یا رمز عبور اشتباه است";
if(isset($_GET['error'])){?>

<div class="alert alert-danger">
  <?php echo $error_msg; ?>
</div> 
<?php } ?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به پنل مدیریت</title>
</head>
<body>
<div class="container p-3 bg-gradient d-flex flex-column justify-content-center align-items-center" style="background-color: #5f63af99;">
    <form method="POST" action="./pages/redirect.php">
      <div class="form-group">
        <label for="username">نام کاربری</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری خود را وارد کنید">
      </div>
      <div class="form-group ">
        <label for="password">گذرواژه</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="گذرواژه خود را وارد کنید">
      </div>
      <div class="my-2"><button type="submit" class="btn btn-primary mt-1">ارسال </button></div>
    </form>
</div>

</body>
</html>