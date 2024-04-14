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
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 justify-content-center"> <!-- Thêm lớp 'justify-content-center' để căn giữa theo chiều ngang -->
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
                            <?php foreach ($_SESSION['cart'] as $item) : ?>
                                <tr>
                                    <td class="align-middle">
                                        <?php if (!empty($item->image) && file_exists($item->image)) : ?>
                                            <img src="/shopclothing/<?= $item->image ?>" alt="<?= $item->name ?>" style="width: 50px;">
                                        <?php else : ?>
                                            No Image!
                                        <?php endif; ?>
                                    </td>
                                    <?php
                                        // Tính giá sau khi áp dụng giảm giá
                                        $discountedPrice = $item->price - ($item->price * $item->discount / 100);
                                        $total = $discountedPrice * $item->quantity;
                                    ?>
                                    <td class="align-middle"><?=  $item->size   ?></td>
                                    <td class="align-middle"><?=  $discountedPrice   ?></td>
                                    <td class="align-middle">
                                        <form method="post" action="/shopclothing/cart/updateQuality/<?= $item->id ?>">
                                            <div class="input-group quantity">
                                                <input type="number" name="quantity" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?= $item->quantity ?>">
                                            </div>
                                            <input type="submit" value="Update" class="btn btn-sm btn-info mt-2">
                                        </form>
                                    </td>
                                    <td class="align-middle"><?=  $total ?></td>
                                    <td class="align-middle">
                                        <form method="post" action="/shopclothing/cart/delete/<?= $item->id ?>">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Giỏ hàng trống!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Cart End -->



<?php

include_once 'app/views/user/footer.php';

?>
