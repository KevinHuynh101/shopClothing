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
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<form action="/shopclothing/cart/process_order" method="post">
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Họ và Tên:</label>
                        <input class="form-control" type="text" id="hoTen" name="hoTen">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Điện Thoại:</label>
                        <input class="form-control" type="text" id="dienThoai" name="dienThoai" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Địa Chỉ Nhận Hàng:</label>
                        <input class="form-control" type="text" id="diachi" name="diachi">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Ghi Chú:</label>
                        <input class="form-control" type="text" id="ghichu" name="ghichu">
                    </div>
                    <div class="col-md-6 form-group">
                    <label>Phương Thức Thanh Toán:</label><br>
                        <input type="radio" id="cod" name="phuongThucThanhToan" value="cod" checked>
                        <label for="cod">COD</label><br>
                        <input type="radio" id="bank_transfer" name="phuongThucThanhToan" value="bank_transfer">
                        <label for="bank_transfer">Chuyển khoản</label><br><br>

                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Tôi chấp nhận điều khoản và điều kiện</label><br><br>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <?php
                    echo "<ul>";

                    foreach ($_SESSION['cart'] as $item) {
                        echo "<li class='d-flex justify-content-between'> 
                                <span>$item->name</span>
                                <label class='font-weight-medium' name='quality' type='number' value=".$item->size.">$item->size</label>
                                <label class='font-weight-medium text-center' name='quality' type='number' value=".$item->quantity.">$item->quantity</label>
                                
                            </li>";
                    }
                    echo "</ul>";
                    ?>
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$160</h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="bg-light p-30">
                    <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Xác Nhận Mua Hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Checkout End -->

<?php
include_once 'app/views/user/footer.php';
?>
