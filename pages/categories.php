<?php
include '../config/config.php';

include '../bootstrap/bs.php';

?>
<?php
if(isset($_GET['delete'])){
    $catID = $_GET['cid'] ;
    mysqli_query( $con , "DELETE FROM `category` WHERE cid = '$catID' ");
}

?>



<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دسته بندی های</title>
</head>
<body>
<div class="container bg-gradien w-50" style="background-color:#efefef ;">
    <table class="table ">
        <tr>
            <th>نام دسته بندی</th>
            <th>عملیات</th>
        </tr>
        <tr>
        <?php
    $catRes = mysqli_query( $con , "SELECT * FROM `category` ORDER BY cid ASC");
    while($catRow = mysqli_fetch_assoc($catRes)){ ?>
    
    <td>
    <?php     echo $catRow['cat_topic'];?>
  
    </td>
    <td >
          <div class="">
            <a href="categories.php?delete&cid=<?php echo $catRow['cid'] ?>" class="btn btn-outline-danger">حذف </a>
            <a href="edit-category.php?editcat&cid=<?php echo $catRow['cid'] ?>" class="btn btn-outline-success"> ویرایش</a>
        </div>
        </td>
    </tr>
    <?php } ?>
    </table>
</div>
</body>
</html>