<?php

class UserController{

    private $db;
    private $accountModel;
    private $productModel;
    private $userModel;

    function __construct(){
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
        $this->productModel = new ProductModel($this->db);
        $this->userModel = new UserModel($this->db);
    }


    function test(){
        include_once 'app/views/user/shop.php';
    }

    public function index()
    {

            //$stmt = $this->productModel->readAll();
            $products = $this->userModel->readAll();
            include_once 'app/views/user/index.php';
        
    }

    public function shop()
    {

            //$stmt = $this->productModel->readAll();
            $products = $this->productModel->readAll();
            include_once 'app/views/user/shop.php';
        
    }

     // Phương thức hiển thị trang chi tiết sản phẩm
     public function detail($id) {
        // Gọi hàm từ model để lấy thông tin chi tiết sản phẩm
        $product = $this->userModel->getProductById($id);
        $products = $this->userModel->readAll();
        // Kiểm tra xem sản phẩm có tồn tại không
        if ($product) {
            // Hiển thị trang chi tiết sản phẩm
            include_once 'app/views/user/detail.php';
        } else {
            // Xử lý khi không tìm thấy sản phẩm
            echo "Sản phẩm không tồn tại!";
        }
    }
}