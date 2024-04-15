<?php
class DashboardController
{

    private $productModel;
    private $orderModel;
    private $accountModel;

    private $dbp;
    private $dbo;
    private $dbd;
    public function __construct()
    {
        $this->dbp = (new Database())->getConnection();
        $this->dbo = (new Database())->getConnection();
        $this->dbd = (new Database())->getConnection();

        $this-> orderModel = new OrderModel($this->dbo);
        $this-> productModel = new ProductModel($this->dbp);
        $this-> accountModel = new AccountModel($this->dbp);


    }

    function test(){
        include_once 'app/views/dashboard/index.php';
    }

    public function index() {
        if (!Auth::isLoggedIn() || !Auth::isAdmin()) {
            header('Location: /shopclothing/account/login');
            exit();
        } else {
            // Gọi phương thức từ model để tính tổng số tiền của các đơn hàng đã xác nhận
            $total = $this->orderModel->sumtotal();
            // Gọi phương thức từ model để tính tổng số sản phẩm trong bảng products
            $countproducts = $this->productModel->countProducts();
            // Gọi phương thức từ model để tính tổng số đơn hàng
            $countorders = $this->orderModel->countOrders();
            // Gọi phương thức từ model để tính tổng số tài khoản
            $countaccounts = $this->accountModel->countAccounts();
            // Gọi phương thức từ model để lấy top sản phẩm bán được nhiều nhất
            $topProducts = $this->orderModel->getTopProducts(5); // Lấy 5 sản phẩm hàng đầu

            include_once 'app/views/dashboard/index.php';
        }
    }


}