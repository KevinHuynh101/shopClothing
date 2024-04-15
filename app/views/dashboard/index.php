<?php include_once 'app/views/share/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
    
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <!-- Tổng số sản phẩm -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng số sản phẩm</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countproducts; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng số tiền</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            // Hiển thị tổng số tiền đã tính được từ controller
                            echo "$total đồng";
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng số đơn hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo $countorders; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Tổng số tài khoản</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $countaccounts; ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Content Row -->


<div class="row">

    
<div class="container">
        <h1 class="mt-5">Top Sản Phẩm Bán Chạy</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <?php foreach ($topProducts as $product): ?>
                        <a href="#" class="list-group-item list-group-item-action">
                            <?= $product['productName'] ?> 
                            <span class="badge badge-primary badge-pill"><?= $product['total_sold'] ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">


</div>
<!-- /.container-fluid -->
<?php include_once 'app/views/share/footer.php'; ?>