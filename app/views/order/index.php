<?php include_once 'app/views/share/header.php'; ?>

<div class="row">
    <div class="col-sm-12">
        <h1>Danh sách các đơn đặt hàng</h1>
        <table class="table table-bordered" id="orderTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Phone</th>
                    <th>Tên sản phẩm</th> <!-- Thêm cột Tên sản phẩm -->
                    <th>Giá</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $orders->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['name'] ?></td>
                        <td><?= $order['phone'] ?></td>
                        <td><?= $order['productName'] ?></td> <!-- Hiển thị tên sản phẩm -->
                        <td><?= $order['price'] ?></td>
                        <td><?= $order['size'] ?></td>
                        <td><?= $order['quantity'] ?></td>
                        <td><?= $order['total'] ?></td>
                        <td><?= $order['action'] ?></td>
                        <td>
                            <a href="/shopclothing/order/updateaction/<?= $order['id'] ?>" class="btn btn-sm btn-info">
                            ✔
                            </a>
                            <a href="/shopclothing/order/cancelaction/<?= $order['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn đặt hàng này?')">
                            ✘
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'app/views/share/footer.php'; ?>
