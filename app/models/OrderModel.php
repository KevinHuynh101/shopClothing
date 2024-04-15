<?php
class OrderModel {
    private $conn;
    private $table_name = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        // Truy vấn SQL để lấy thông tin từ cả hai bảng orders và products
        $query = "SELECT o.*, p.name AS productName FROM $this->table_name o LEFT JOIN products p ON o.productID = p.id";

        // Chuẩn bị câu lệnh truy vấn
        $stmt = $this->conn->prepare($query);

        // Thực thi truy vấn
        $stmt->execute();

        // Trả về kết quả
        return $stmt;
    }

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
    public function updateAction($orderId, $action= "Xác nhận") {
        // Truy vấn SQL để cập nhật cột "action"
        $query = "UPDATE $this->table_name SET action = :action WHERE id = :orderId";

        // Chuẩn bị câu lệnh truy vấn
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $orderId = htmlspecialchars(strip_tags($orderId));
        $action = htmlspecialchars(strip_tags($action));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':action', $action);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function cancelaction($orderId, $action= "Hủy") {
        // Truy vấn SQL để cập nhật cột "action"
        $query = "UPDATE $this->table_name SET action = :action WHERE id = :orderId";

        // Chuẩn bị câu lệnh truy vấn
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $orderId = htmlspecialchars(strip_tags($orderId));
        $action = htmlspecialchars(strip_tags($action));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':orderId', $orderId);
        $stmt->bindParam(':action', $action);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    

    
}