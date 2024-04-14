<?php include_once 'app/views/share/header.php'; ?>

<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account) : ?>
                    <tr>
                        <td><?= $account['id'] ?></td>
                        <td><?= $account['email'] ?></td>
                        <td><?= $account['name'] ?></td>
                        <td><?= $account['password'] ?></td>
                        <td><?= $account['role'] ?></td>
                        <td>
                            <a href="/shopclothing/account/delete/<?= $account['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                <i class="fas fa-trash"></i> <!-- Sử dụng font-awesome -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'app/views/share/footer.php'; ?>
