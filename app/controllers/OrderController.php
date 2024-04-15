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
}