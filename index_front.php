        <?php include 'config/config.php'; ?>
        <?php include 'header.php'; ?>

        <main class="main default">
            <div class="container">
                
                <!-- banner -->
                <div class="row">
                   
                <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
                        <div class="sidebar-inner default">
                            <div class="widget-banner widget card">
                                <a href="#" target="_top">
                                    <img class="img-fluid" src="assets/img/banner/1455.jpg" alt="">
                                </a>
                            </div>
                            
                            <div class="widget-banner widget card">
                                <a href="#" target="_blank">
                                    <img class="img-fluid" src="assets/img/banner/1000001422.jpg" alt="">
                                </a>
                            </div>
                            
                        </div>
                   
                    </aside>

                    <div class="col-12 col-lg-9 order-1 order-lg-2">

                        <section id="main-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#main-slider" data-slide-to="1"></li>
                                <li data-target="#main-slider" data-slide-to="2"></li>
                                <li data-target="#main-slider" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="d-block" href="#">
                                        <img src="assets/img/slider/22f48d8e-6a8f-431c-985d-76ab0e1e59405_21_1_1.jpg"
                                            class="d-block w-100" alt="">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="d-block" href="#">
                                        <img src="assets/img/slider/a264d696-9c12-4dd9-bdc1-12c13a3632b329_21_1_1.jpg"
                                            class="d-block w-100" alt="">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="d-block" href="#">
                                        <img src="assets/img/slider/c0a50594-df40-412b-84f8-c7d6872fb83620_21_1_1.jpg"
                                            class="d-block w-100" alt="">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="d-block" href="#">
                                        <img src="assets/img/slider/d1844e92-e5a9-4aef-8ea7-49be936422ca6_21_1_1.jpg"
                                            class="d-block w-100" alt="">
                                    </a>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                                <i class="now-ui-icons arrows-1_minimal-right"></i>
                            </a>
                            <a class="carousel-control-next" href="#main-slider" data-slide="next">
                                <i class="now-ui-icons arrows-1_minimal-left"></i>
                            </a>
                        </section>
                        
                        <div class="row banner-ads">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 col-lg-3">
                                        <div class="widget-banner card">
                                            <a href="#" target="_blank">
                                                <img class="img-fluid" src="assets/img/banner/banner-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="widget-banner card">
                                            <a href="#" target="_top">
                                                <img class="img-fluid" src="assets/img/banner/banner-2.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="widget-banner card">
                                            <a href="#" target="_top">
                                                <img class="img-fluid" src="assets/img/banner/banner-3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <div class="widget-banner card">
                                            <a href="#" target="_top">
                                                <img class="img-fluid" src="assets/img/banner/banner-4.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="widget widget-product card">
                                    <header class="card-header">
                                        <h3 class="card-title">
                                            <span>جدیدترین محصولات</span>
                                        </h3>
                                        <a href="#" class="view-all">مشاهده همه</a>
                                    </header>
                                    <div class="product-carousel owl-carousel owl-theme">

                                    <?php
                                    $result = mysqli_query($con , "SELECT * FROM `product` ORDER BY pid DESC LIMIT 5");
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <div class="item">
                                            <a href="#">
                                                <img src="product_image/<?php echo $row['product_image']?>"
                                                    class="img-fluid" alt="">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#"> <?php echo $row['productname']; ?></a>
                                            </h2>
                                            <div class="price">
                                                <!-- <div class="text-center">
                                                    <del><span>4,299,000<span>تومان</span></span></del>
                                                </div> -->
                                                <div class="text-center">
                                                    <ins><span><?php echo number_format($row['price']); ?><span>تومان</span></span></ins>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                    </div>
                </div>

            </div>
        </main>


        <?php include 'footer.php'; ?>