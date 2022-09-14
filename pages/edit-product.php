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
    <title>ویرایش محصول</title>
</head>



<?php
if (isset($_GET['edit'])) {
    $pid = $_GET['pid'];

    $result = mysqli_query($con, "SELECT * FROM `product` WHERE pid = $pid ");
    $row = mysqli_fetch_assoc($result);

    echo "<pre>";
    print_r($row);
    echo "</pre>";
    echo "توجه شود اطلاعات که قابل مشاهده هست به صورت آرایه قبل از عمل ویرایش میباشد";
}


if (isset($_POST['productname'])) {
    $productname = $_POST['productname'];
    $cat_id = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if (isset($_FILES['productimage'])) {
        $file_name = $_FILES['productimage']['name'];
        $temp_name = $_FILES['productimage']['tmp_name'];
        $image_type = $_FILES["productimage"]["type"];


        if ($image_type == "image/jpeg" or $image_type == "image/jpeg" or $image_type == "image/png") {
            move_uploaded_file($temp_name, "../product_image/$file_name");
            mysqli_query($con, "UPDATE `product` SET `product_image` = '$file_name' WHERE pid = '$pid'; ");
        }
        mysqli_query($con, "UPDATE `product` SET `productname` = '$productname',`cid`='$cat_id', `price` = '$price', `description` = '$description' WHERE `product`.`pid` = '$pid';");
        $msg = "ویرایش محصول با موفقیت انجام شد";
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE pid = $pid ");
        $row = mysqli_fetch_assoc($result);
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
        <form action="edit-product.php?edit&pid=<?php echo $row['pid']; ?>" enctype="multipart/form-data" method="POST" class="w-50">
            <form-group>
                <label for="productname" class="form-label fs-6 fw-bold">نام محصول</label>
                <input type="text" name="productname" id="productname" class="form-control" value="<?php echo $row['productname']; ?>">
            </form-group>


            <form-group>

                <label for="category" class="form-label fs-6 fw-bold "> دسته بندی</label>

                <select class="form-select" name="category" id="category">
                    <option selected disabled>یک دسته بندی انتخاب کنید</option>
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
                <?php if ($row['product_image'] != '') { ?>

                    <img src="../product_image/<?php echo $row['product_image']; ?>" width=100;alt=""><br>
                <?php   } else {
                    echo "این محصول عکس ندارد";
                }

                ?>
                <label for="productimage" class="form-label fs-6 fw-bold">تصویر محصول</label>
                <input type="file" name="productimage" id="productname" class="form-control">

            </form-group>

            <div class="form-group">
                <label for="price" class="fs-6 fw-bold">قیمت</label>
                <input type="text" name="price" id="price" class="form-control" value="<?php echo $row['price']; ?>">
            </div>

            <div class="form-group">
                <label for="desc" class="fs-6 fw-bold">توضیحات</label>
                <textarea name="description" id="desc" class="form-control" rows="10"><?php echo $row['description']; ?></textarea>
            </div>
            <div class=" form-group">
                <button class="btn btn-success mt-3" type="submit">
                    ویرایش
                </button>
            </div>
        </form>

        <a href="../index.php" class="btn btn-warning">صفحه اصلی</a>

    </div>




</body>

</html>