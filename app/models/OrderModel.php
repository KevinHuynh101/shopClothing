<?php
class OrderModel {
    private $conn;
    private $table_name = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }

    // function readAll() {
    //     $query = "SELECT id, name, description, price, image FROM " . $this->table_name;

    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();

    //     return $stmt;
    // }

    function createOrder($hoTen, $dienThoai, $email, $diachi, $ghichu, $phuongThucThanhToan, $productID, $soLuong, $size, $donGia, $thanhTien)
    {
        // uploadResult: đường dẫn của file hình 
        // uploadResult = false: lỗi upload hình ảnh
        // Kiểm tra ràng buộc đầu vào
        $errors = [];
        if (empty($hoTen)) {
            $errors['hoTen'] = 'Tên không được để trống';
        }
        if (empty($dienThoai)) {
            $errors['dienThoai'] = 'Dien thoai khong dc de trong';
        }
        if (empty($email)) {
            $errors['email'] = 'Email khọng duoc de trong';
        }


        // Truy vấn tạo sản phẩm mới

        $query = "INSERT INTO " . $this->table_name . " (name, phone, email, address, note, payment, productID ,quantity ,price, size,total) VALUES (:hoTen, :dienThoai, :email, :diachi, :ghichu, :phuongThucThanhToan, :productID, :soLuong, :donGia, :size, :thanhTien)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $hoTen = htmlspecialchars(strip_tags($hoTen));
        $dienThoai = htmlspecialchars(strip_tags($dienThoai));
        $email = htmlspecialchars(strip_tags($email));
        $diachi = htmlspecialchars(strip_tags($diachi));
        $ghichu = htmlspecialchars(strip_tags($ghichu));
        $phuongThucThanhToan = htmlspecialchars(strip_tags($phuongThucThanhToan));
        $productID = htmlspecialchars(strip_tags($productID));
        $soLuong = htmlspecialchars(strip_tags($soLuong));
        $donGia = htmlspecialchars(strip_tags($donGia));
        $thanhtien = htmlspecialchars(strip_tags($thanhTien));
        $size = htmlspecialchars(strip_tags($size));
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':dienThoai', $dienThoai);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':diachi', $diachi);
        $stmt->bindParam(':ghichu', $ghichu);
        $stmt->bindParam(':phuongThucThanhToan', $phuongThucThanhToan);
        $stmt->bindParam(':productID', $productID);
        $stmt->bindParam(':soLuong', $soLuong);
        $stmt->bindParam(':donGia', $donGia);
        $stmt->bindParam(':thanhTien', $thanhTien);
        $stmt->bindParam(':size', $size);
           
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    

    
}