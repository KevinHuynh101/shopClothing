<?php
include_once 'app/views/share/header.php';
?>

<div class="row">

    <a href="/shopclothing/product/add" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i> <!-- Thay đổi class icon thành "fa-plus" -->
        </span>
        <span class="text">Thêm sản phẩm</span>
    </a>


    <div class="col-sm-12">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Chi tiết sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Giảm giá</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <!-- <th>
                           
                            <a class="btn btn-danger" href="/shopclothing/cart/add/<?= $row['id'] ?>">ADD TO CART</a>
                        </th> -->
                        <th><?= $row['name'] ?></th>
                        <th><?= $row['description'] ?></th>
                        <th><?= $row['category'] ?></th>
                        <th>
                            <?php
                                if (empty($row['image']) || !file_exists($row['image'])) {
                                    echo "No Image!";
                                } else {
                                    echo "<img src='/shopclothing/" . $row['image'] . "' style='width: 200px; height: auto;' />";
                                }
                            ?>
                        </th>
                        <th><?= $row['discount'] ?>%</th>
                        <th><?= $row['price'] ?></th>
                        <th>
                            <a href="/shopclothing/product/edit/<?=$row['id']?>" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> <!-- Sử dụng font-awesome -->
                            </a>
                            <!-- #region -->
                            <a href="/shopclothing/product/delete/<?=$row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                <i class="fas fa-trash"></i> <!-- Sử dụng font-awesome -->
                            </a>
                        </th>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>



<?php

include_once 'app/views/share/footer.php';

?>