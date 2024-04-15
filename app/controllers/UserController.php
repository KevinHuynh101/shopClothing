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



    public function index()
    {

            //$stmt = $this->productModel->readAll();
            $products = $this->userModel->readAll();
            include_once 'app/views/user/index.php';
        
    }

    public function shop() {
       
        // Kiểm tra xem có yêu cầu lọc theo danh mục không
        if(isset($_GET['categories']) && !empty($_GET['categories'])) {
            $selectedCategories = $_GET['categories'];
            // Gọi phương thức trong model để lọc sản phẩm theo danh mục được chọn
            $products = $this->productModel->getProductsByCategories($selectedCategories);
        } else {
            // Nếu không có yêu cầu lọc, hiển thị tất cả sản phẩm
            $products = $this->productModel->readAll();
        }

        // Hiển thị trang shop với danh sách sản phẩm đã lọc
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