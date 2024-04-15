<?php
include_once 'app/views/user/header.php';
?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Loc theo danh mục</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="aothun">
                            <label class="custom-control-label" for="aothun">Áo thun</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="aosomi">
                            <label class="custom-control-label" for="aosomi">Áo sơ mi</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="quankaki">
                            <label class="custom-control-label" for="quankaki">Quần kaki</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="quanngan">
                            <label class="custom-control-label" for="quanngan">Quần ngắn</label>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3"> 
                    <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <?php if (empty($row['image']) || !file_exists($row['image'])) : ?>
                                        <img class="img-fluid w-100" src="img/no-image.jpg" alt="No Image">
                                    <?php else : ?>
                                        <img class="img-fluid w-100" src="/shopclothing/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                                    <?php endif; ?>
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="/shopclothing/user/detail/<?= $row['id'] ?>"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="#"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <?php
                                    // Tính giá sau khi áp dụng giảm giá
                                    $discountedPrice = $row['price'] - ($row['price'] * $row['discount'] / 100);
                                ?>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href=""><?= $row['name'] ?></a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5><?= $discountedPrice ?></h5>
                                        <?php if ($row['discount'] > 0) : ?>
                                            <h6 class="text-muted ml-2"><del><?= $row['price'] ?> </del></h6>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($row['discount'] > 0) : ?>
                                        <a class="h6 text-decoration-none text-truncate text-warning" href=""> giảm <?= $row['discount'] ?>%</a>
                                    <?php endif; ?>
                                </div>                                               
                            </div>                  
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

<?php

include_once 'app/views/user/footer.php';

?>