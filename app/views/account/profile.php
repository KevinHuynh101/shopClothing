<?php include_once 'app/views/share/header.php'; ?>


<div class="card-body p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"> Thông tin cá nhân</h1>
    </div>
    <form class="user" action="/shopclothing/account/update" method="post">
        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= $account->email ?>">
        </div>
        <div class="form-group">
            <label for="fullname">Họ và tên:</label><br>
            <input type="text" class="form-control form-control-user" id="fullname" name="fullname" value="<?= $account->fullname ?>">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label><br>
            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group text-center">
            <button class="btn btn-primary btn-icon-split p-3">Lưu thông tin</button>
        </div>
        
    </form>
</div>

<?php include_once 'app/views/share/footer.php'; ?>
