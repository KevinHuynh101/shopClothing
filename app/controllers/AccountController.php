<?php

class AccountController{

    private $db;
    private $accountModel;

    function __construct(){
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    function login(){
        include_once 'app/views/account/login.php';
    }

    function register(){
        include_once 'app/views/account/register.php';
    }

    function save(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';

            $errors =[];
            if(empty($username)){
                $errors['username'] = "Vui lòng nhập userName!";
            }
            if(empty($email)){
                $errors['email'] = "Vui lòng nhập email !";
            }
            if(empty($fullName)){
                $errors['fullname'] = "Vui lòng nhập fullName!";
            }
            if(empty($password)){
                $errors['password'] = "Vui lòng nhập password!";
            }
            if($password != $confirmPassword){
                $errors['confirmPass'] = "Mat khau va xac nhan chua dung";
            }
            //kiểm tra username đã được đăng ký chưa?
            $account = $this->accountModel->getAccountByUsername($username);

            if($account){
                $errors['account'] = "Tai khoan nay da co nguoi dang ky!";
            }
            
            if(count($errors) > 0){
                include_once 'app/views/account/register.php';
            }else{
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                
                $result = $this->accountModel->save($email, $username, $fullName, $password);
                
                if($result){
                    header('Location: /shopclothing/account/login?success=1');
                }
            }
        }       
       
    }
    function checkLogin(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $errors =[];
            if(empty($username)){
                $errors['username'] = "Vui long nhap userName!";
            }
            if(empty($password)){
                $errors['password'] = "Vui long nhap password!";
            }
            if(count($errors) > 0){
                include_once 'app/views/account/login.php';
            }
            $account = $this->accountModel->getAccountByUsername($username);
            
            if($account && password_verify($password, $account->password)){
                //dang nhap thanh cong
                //luu trang thai dang nhap
                $_SESSION['username'] = $account->name;
                $_SESSION['role'] = $account->role;

                // Kiểm tra nếu là admin thì chuyển hướng đến trang admin
                if(Auth::isAdmin()) {
                    header('Location: /shopclothing');
                } else {
                    header('Location: /shopclothing');
                }
                exit();
            }else{
                $errors['account'] = "Dang nhap that bai!";
                include_once 'app/views/account/login.php';
            }
        }
    }

    function logout(){
        
        unset($_SESSION['username']);
        unset($_SESSION['role']);

        header('Location: /shopclothing/account/login');
    }
}