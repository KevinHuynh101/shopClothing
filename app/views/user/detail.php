
<?php
include_once 'app/views/user/header.php';
?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <!-- Thay đổi đường dẫn và alt của ảnh sản phẩm -->
                        <img class="w-100 h-100" src="/shopclothing/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <!-- Hiển thị tên sản phẩm -->
                <h3><?= $product['name'] ?></h3>
                <!-- Hiển thị giá sản phẩm -->
                <h3 class="font-weight-semi-bold mb-4"><?= $product['price'] ?></h3>
                <!-- Hiển thị mô tả sản phẩm -->
                <p class="mb-4"><?= $product['description'] ?></p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Sizes:</strong>
                    <!-- Form chọn kích thước -->
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <!-- Thêm các option kích thước khác ở đây -->
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <!-- Nút thêm vào giỏ hàng
                    <button class="btn btn-primary px-3" onclick="addToCart(<?= $product['id'] ?>)">
                        <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                    </button> -->
                    <a class="btn btn-primary px-3" href="/shopclothing/cart/add/<?= $product['id'] ?>"><i class="fa fa-shopping-cart mr-1"> Thêm giỏ hàng </i></a>

                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Có thể bạn thích</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)) : ?>

                    <div class="product-item bg-light">
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
                    <?php endwhile; ?>       
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
<?php

include_once 'app/views/user/footer.php';

?>