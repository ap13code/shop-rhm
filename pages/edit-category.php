<?php
include '../config/config.php';

include '../bootstrap/bs.php';

?>


<?php
if (isset($_GET['editcat'])) {
    $categoryID = $_GET['cid'];


    $category_result = mysqli_query($con, " SELECT * FROM `category` WHERE cid ='$categoryID' ;");
    $category_row = mysqli_fetch_assoc($category_result);
    echo " <pre>";
    print_r($category_row);
    echo "</pre>";
   }



if (isset($_POST['cat_topic'])) {
    $cat_topic = $_POST['cat_topic'];
    mysqli_query($con, "UPDATE `category` SET `cat_topic` = '$cat_topic' WHERE `cid` = '$categoryID';");
}

?>
<div class="container p-3 bg-gradient" style="background-color: #2e3139;">

    <form class="form w-25" action="edit-category.php?editcat&cid=<?php echo $category_row['cid'] ?>" method="POST">
        <label for="category-title">نام دسته بندی جدید را وارد کنید</label>
        <input type="text" class="form-control" id="category-title" name="cat_topic" value="<?php echo $category_row['cat_topic']; ?>">
        <div class="mt-1">

            <button class="btn btn-outline-info" type="submit">ویرایش</button>
        </div>


    </form>
</div>