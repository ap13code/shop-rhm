<?php
include '../config/config.php';

include '../bootstrap/bs.php';

?>


<?php
if(isset($_GET['delete'])){
    $pid = $_GET['product-id'];

    mysqli_query( $con , "DELETE FROM `product` where pid = $pid ");
}

?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> آرشیو محصولات</title>
</head>

<body>
    <div class="container w-85 rounded " style="background-color:#CCCCFF ;">
    <div class="d-flex justify-content-start flex-column p-3 my-3">
            <a href="../index.php"  class="btn btn-warning w-25 align-self-center">صفحه اصلی</a>
<p class="my-2"> مرتب سازی براساس : <a href="archive-latest.php" class="btn btn-primary" style="font-size:14px;">جدید ترین</a></p>

        </div>
        <table class="table">
            <tr>
                <th>ردیف</th>
                <th>شناسه کالا</th>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>توضیحات</th>
                <th>تصویر محصول</th> 
                <th>عملیات</th> 
            </tr>
            <?php
            $i=1;
            $all_fields = mysqli_query($con, "SELECT * FROM `product` ORDER BY pid ASC");
            while ($row = mysqli_fetch_assoc($all_fields)) { ?>
                <tr>
                    <td class="text-secondary fs-5 fw-light">
                    <div class="rounded  fs-6 py-1 text-black-50 text-center" style="background-color: #EEC900;"><?php echo $i++; ?></div>        
                </td>
                    <td><?php echo $row['pid'] ?></td>
                    <td><?php echo $row['productname']; ?></td>
                    <td><?php 
                        if(isset($row['price']) and $row['price'] !=NULL )
                        {
                            $price =$row['price'];
                            echo number_format($price);
                        }
                        else {
                            echo "بدون قیمت";
                        }
                    ?></td>
                    <td><?php echo $row['description']; ?></td>
                    
                    <td>
                    <?php
                    if($row['product_image']!=''){
                        ?>
                    <img src="../product_image/<?php echo $row['product_image']?>" alt=""ش width="100">
                <?php    }
                else{
                    ?>
                    <div class="alert alert-warning w-50"><?php echo "بدون تصویر ";?></div>
                    <?php
                }
                        ?>
                    </td>

                    <td>
                        <div class="d-flex">
                            <a href="archive-latest.php?delete&product-id=<?php echo $row['pid']; ?>" class="btn btn-danger mx-1" style="font-size:12px ;">حذف</a>
                            <a href="edit-product.php?edit&pid=<?php echo $row['pid'];?>" class="btn btn-success" style="font-size:12px ;">ویرایش</a>
                        </div>
                    </td>

                </tr>
            <?php } ?>
        </table>
       
    </div>
</body>

</html>