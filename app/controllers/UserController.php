<?php

class UserController{

    private $db;
    private $accountModel;
    private $productModel;

    function __construct(){
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
        $this->productModel = new ProductModel($this->db);
    }

    function index(){
        include_once 'app/views/user/index.php';
    }

    public function listProducts()
    {

            //$stmt = $this->productModel->readAll();
            $products = $this->productModel->readAll();
            include_once 'app/views/user/index.php';
        
    }
}