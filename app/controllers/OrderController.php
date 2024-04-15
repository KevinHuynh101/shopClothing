<?php

class OrderController{

    private $db;
    private $orderModel;

    function __construct(){
        $this->db = (new Database())->getConnection();
        $this->orderModel = new OrderModel($this->db);
    }
    public function index()
    {
        if(!Auth::isLoggedIn()|| !Auth::isAdmin()){
            header('Location: /shopclothing/account/login');
            exit(); // Chắc chắn rằng không có mã PHP nào khác được thực thi sau lệnh header
        } else {

            $orders = $this->orderModel->readAll();
            include_once 'app/views/order/index.php';
        }
    }
    public function updateAction($orderId) {
        if (!Auth::isLoggedIn() || !Auth::isAdmin()) {
            header('Location: /shopclothing/account/login');
            exit(); 
        } else {
            // Gọi phương thức trong model để cập nhật cột "action"
            $success = $this->orderModel->updateAction($orderId);
            if ($success) {
                // Nếu cập nhật thành công, chuyển hướng hoặc thực hiện hành động khác
                header('Location: /shopclothing/order/index');
                exit();
            } else {
                // Xử lý khi cập nhật không thành công
                echo "Cập nhật action không thành công!";
            }
        }
    }
    public function cancelaction($orderId) {
        if (!Auth::isLoggedIn() || !Auth::isAdmin()) {
            header('Location: /shopclothing/account/login');
            exit(); 
        } else {
            // Gọi phương thức trong model để cập nhật cột "action"
            $success = $this->orderModel->cancelaction($orderId);
            if ($success) {
                // Nếu cập nhật thành công, chuyển hướng hoặc thực hiện hành động khác
                header('Location: /shopclothing/order/index');
                exit();
            } else {
                // Xử lý khi cập nhật không thành công
                echo "Cập nhật action không thành công!";
            }
        }
    }
}