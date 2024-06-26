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
                <?php
                        // Tính giá sau khi áp dụng giảm giá
                        $discountedPrice = $product['price'] - ($product['price'] * $product['discount'] / 100);
                ?>
                
                <div class="font-weight-semi-bold mb-4">
                    <?php if ($product['discount'] > 0) : ?>
                        <h6 class="text-muted ml-2"><del>$<?= $product['price'] ?> </del></h6>
                    <?php endif; ?>
                    <h5>$<?= $discountedPrice ?></h5>
                </div>
                <?php if ($product['discount'] > 0) : ?>
                    <a class="h6 text-decoration-none text-truncate text-warning" href=""> giảm <?= $product['discount'] ?>%</a>
                <?php endif; ?>
                        
              
                <!-- Hiển thị mô tả sản phẩm -->
                <p class="mb-4"><?= $product['description'] ?></p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Sizes:</strong>
                    <!-- Form chọn kích thước -->
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size" value="XS">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size" value="XXS">
                            <label class="custom-control-label" for="size-2">XXS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size" value="XXXS">
                            <label class="custom-control-label" for="size-3">XXXS</label>
                        </div>
                        <!-- Thêm các option kích thước khác ở đây -->
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <button class="btn btn-primary px-3" onclick="addToCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</button>
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

<script>
    function addToCart(productId) {
        // Lấy kích thước được chọn
        var selectedSize = document.querySelector('input[name="size"]:checked');
        var sizeValue = selectedSize ? selectedSize.value : null;

        // Kiểm tra xem đã chọn kích thước chưa
        if (!sizeValue) {
            alert("Vui lòng chọn kích thước!");
            return;
        }

        // Tạo một đối tượng FormData để gửi dữ liệu
        var formData = new FormData();
        formData.append('productId', productId);
        formData.append('size', sizeValue);

        // Tạo một request AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/shopclothing/cart/add/' + productId + '/' + sizeValue, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Xử lý phản hồi từ máy chủ (nếu cần)
                console.log(xhr.responseText);
            }
        };
        // Gửi dữ liệu form
        xhr.send(formData);
    }
</script>
