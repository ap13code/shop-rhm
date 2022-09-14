<?php
include '../config/config.php';

include '../bootstrap/bs.php';

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> درج محصول</title>
</head>


<?php

if (isset($_POST['productname'])) {
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $productimage = '';
    $cid = $_POST['category'];

    if ($_FILES['productimage'] != '') {
        $file_name = $_FILES['productimage']['name'];
        $temp_name = $_FILES['productimage']['tmp_name'];
        $image_type = $_FILES["productimage"]["type"];


        if ($image_type == "image/jpeg" or $image_type == "image/jpeg" or $image_type == "image/png") {
            move_uploaded_file($temp_name, "../product_image/$file_name");
        }
        mysqli_query($con, "INSERT INTO `product` (`pid`,`cid`, `productname`, `price`, `description` ,`product_image`) VALUES (NULL,'$cid', '$productname', '$price', '$description' ,'$file_name')");
        $msg = "درج محصول با موفقیت اجام شد";
    }
} else {
    echo "error";
}



?>


<?php
if (isset($msg)) { ?>
    <div class="alert alert-success">
        <?php echo $msg; ?>
    </div>
<?php } ?>







<body>
    <div class="container mt-4 p-5 rounded shadow" style="background: #fff8e4;">
        <form action="addproduct.php" enctype="multipart/form-data" method="POST" class="w-50">
            <form-group>
                <label for="productname" class="form-label fs-6 fw-bold ">نام محصول</label>
                <input type="text" name="productname" id="productname" class="form-control" required>
            </form-group>


            <form-group>

                <label for="category" class="form-label fs-6 fw-bold ">انتخاب دسته بندی</label>

                <select class="form-select" name="category" id="category">
                    <?php
                    $category_result = mysqli_query($con, " SELECT * FROM `category` ORDER BY cid ");
                    while ($category_row = mysqli_fetch_assoc($category_result)) { ?>
                        <option value="<?php echo $category_row['cid']; ?>">
                        <?php echo $category_row['cat_topic']; ?>
                    </option>
                    <?php } ?>
                </select>
            </form-group>


            <form-group>
                <div><label for="productimage" class="form-label fs-6 fw-bold">تصویر محصول</label>
                <input type="file" name="productimage" id="productname" class="form-control">
                </div>
                

            </form-group>

            <div class="form-group">
                <label for="price" class="fs-6 fw-bold">قیمت</label>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="desc" class="fs-6 fw-bold">توضیحات</label>
                <textarea name="description" id="desc" class="form-control" rows="10"></textarea>
            </div>
            <div class=" form-group">
                <button class="btn btn-success mt-3" type="submit">
                    ثبت محصول
                </button>
            </div>
        </form>

        <a href="../index.php" class="btn btn-warning">صفحه اصلی</a>

    </div>
    <?php
    if (isset($msg_error)) { ?>
        <div class="alert alert-danger">
            <?php echo $msg_error; ?>
        </div>
    <?php } ?>

</body>

</html>