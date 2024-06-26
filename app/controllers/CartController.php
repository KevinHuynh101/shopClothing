<?php
class CartController
{

    private $productModel;
    private $orderModel;


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



    }


    public function updateQuality($id)
    {
        $newQuantity = $_POST['quantity'];
        foreach ($_SESSION['cart'] as &$item) {
            if ($item->id == $id) {
                $item->quantity = $newQuantity;

                break;
            }
        }
        header('Location: /shopclothing/cart/show');
    }

    public function delete($id)
    {
        foreach ($_SESSION['cart'] as $key => $item) {
            // Kiểm tra xem sản phẩm có ID trùng khớp không
            if ($item->id == $id) {
                // Xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$key]);
                break; // Dừng vòng lặp sau khi xóa sản phẩm
            }
        }
        header('Location: /shopclothing/cart/show');
    }

    public function Add($id, $size)
    {
        // Khởi tạo một phiên cart nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        // Lấy sản phẩm từ ProductModel bằng $id
        $product = $this->productModel->getProductById($id);
    
        // Nếu sản phẩm tồn tại, thêm vào giỏ hàng
        if ($product) {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $productExist = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item->id == $id && $item->size == $size) {
                    $item->quantity++;
                    $productExist = true;
                    break;
                }
            }
    
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào
            if (!$productExist) {
                // Thêm thông tin kích thước vào sản phẩm
                $product->quantity = 1;
                $product->size = $size;
                $_SESSION['cart'][] = $product;
            }
    
        } else {
            echo "Không tìm thấy sản phẩm với ID này!";
        }
    }
    
   

    public function process_order()
    {
        
        // Kiểm tra xem có phải phương thức POST không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $hoTen = $_POST['hoTen'] ?? '';
            $dienThoai = $_POST['dienThoai'] ?? '';
            $email = $_POST['email'] ?? '';
            $diachi = $_POST['diachi'] ?? '';
            $ghichu = $_POST['ghichu'] ?? '';
            $phuongThucThanhToan = $_POST['phuongThucThanhToan'] ?? '';

            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống!";
            } else {
                // Hiển thị danh sách sản phẩm trong giỏ hàng
                foreach ($_SESSION['cart'] as $item) {
                    $productID = $item->id;
                    $soLuong = $item->quantity;
                    $size =  $item->size;
                    $giaTien = $item->price -($item->price * $item->discount)/100 ;
                    $thanhTien = intval($soLuong) * floatval($giaTien);
                    $result = $this->orderModel->createOrder($hoTen, $dienThoai, $email, $diachi, $ghichu, $phuongThucThanhToan,$productID, $soLuong,$size, $giaTien, $thanhTien);

                }
            }

            if ($result === true) {
                unset($_SESSION['cart']);
                // Đơn hàng được lưu thành công, chuyển hướng về trang chính hoặc trang danh sách
                header('Location: /shopclothing/user/index');
                exit(); // Chắc chắn rằng không có mã PHP nào khác được thực thi sau lệnh header
            } else {
                // Có lỗi xảy ra, hiển thị lại form với thông báo lỗi
                $errors = $result; // Trong trường hợp này, $result có thể chứa thông điệp lỗi
                include 'app/views/user/index.php'; // Đảm bảo rằng đường dẫn đến view là chính xác
                exit(); // Chắc chắn rằng không có mã PHP nào khác được thực thi sau khi include view
            }
        }
    }
    
    function order(){
        include_once 'app/views/user/order.php';
    }
    function show()
    {
        include_once 'app/views/user/cart.php';
    }

    function checkout(){
        if(!Auth::isLoggedIn()){
            echo "<script>alert('Xin lỗi, bạn chưa đăng nhập');</script>";
            header('Location: /shopclothing/account/login');
            exit(); // Chắc chắn rằng không có mã PHP nào khác được thực thi sau lệnh header
        } else {
            header('Location: /shopclothing/cart/order');
            exit(); // Chắc chắn rằng không có mã PHP nào khác được thực thi sau lệnh header
        }
    }
  
}
