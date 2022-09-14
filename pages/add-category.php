<?php
include '../config/config.php';

include '../bootstrap/bs.php';

?>


<?php
if(isset($_POST['cat_topic'])){
    $cat_topic = $_POST['cat_topic'];
    mysqli_query( $con , "INSERT INTO `category`(cat_topic) VALUES('$cat_topic');");
}

?>
<div class="container p-3 bg-gradient" style="background-color: #2e3139;">
    
    <form class="form w-25" action="add-category.php" method="POST">
    <label for="category-title">نام دسته بندی را وارد کنید</label>
    <input type="text" class="form-control" id="category-title" name="cat_topic">
    <div class="mt-1">
        
        <button class="btn btn-outline-info" type="submit">ثبت</button>
    </div>
    
    
    </form>
</div>