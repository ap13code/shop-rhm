<?php
include './config/config.php';
include './bootstrap/bs.php';

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
</head>

<body>
  <div class="container">
    <ul class="list-group">
      <h6 class=" fs-5">محصولات</h6>
      <a href="./pages/addproduct.php" class="text-decoration-none">
          <li class="list-group-item fs-6 text-white bg-gradient fw-bold w-25" style="background-color:#6960EC ;">درج محصول</li>
      </a>
      <a href="./pages/archive.php" class="text-decoration-none">
      <li class="list-group-item fs-6 bg-gradient text-white fw-bold w-25" style="background-color:#6960EC ;">آرشیو محصولات</li>
      </a>

      <a href="./pages/add-category.php" class="text-decoration-none">
      <li class="list-group-item fs-6 bg-gradient text-white fw-bold w-25" style="background-color:#6960EC ;">ایجاد دسته بندی</li>
      </a>

      
      <a href="./pages/categories.php" class="text-decoration-none">
      <li class="list-group-item fs-6 bg-gradient text-white fw-bold w-25" style="background-color:#6960EC ;"> دسته بندی ها</li>
      </a>


      <a href="./login.php?exit" class="text-decoration-none">
      <li class="list-group-item fs-6 bg-gradient text-white fw-bold w-25" style="background-color:#FF5733 ;">خروج از پنل</li>
      </a>
    </ul>
  </div>


</body>

</html>