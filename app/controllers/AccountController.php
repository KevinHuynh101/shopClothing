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

    public function listAccount() {
        // Lấy danh sách tất cả tài khoản từ model
        $accounts = $this->accountModel->getAllAccounts();
    
        // Kiểm tra xem danh sách có rỗng không
        if ($accounts) {
            // Lấy thông tin người dùng hiện tại
            $currentUser = $_SESSION['username'];
    
            // Duyệt qua danh sách tài khoản
            foreach ($accounts as $key => $account) {
                // Nếu tên người dùng là tài khoản của người dùng hiện tại, loại bỏ khỏi danh sách
                if ($account['name'] == $currentUser) {
                    unset($accounts[$key]);
                    break;
                }
            }
    
            // Include view để hiển thị danh sách tài khoản
            include_once 'app/views/account/list.php';
        } else {
            // Xử lý khi không có tài khoản nào được tìm thấy
            echo "Không có tài khoản nào.";
        }
    }

    public function delete($id) {
        // Gọi hàm xóa tài khoản từ AccountModel
        $result = $this->accountModel->deleteAccount($id);
        
        if ($result) {
            // Nếu xóa thành công, chuyển hướng về trang danh sách tài khoản
            header('Location: /shopclothing/account/listAccount');
        } else {
            // Xử lý lỗi nếu cần
            echo "Xóa tài khoản không thành công!";
        }
    }

    // hiển thị trang  thông tin tài khoản:
    public function profile() {
        // Lấy thông tin tài khoản từ session
        $username = $_SESSION['username'];
        
        // Gọi hàm để lấy thông tin tài khoản từ model
        $account = $this->accountModel->getAccountByUsername($username);
    
        // Kiểm tra xem tài khoản có tồn tại không
        if ($account) {
            // Hiển thị form chỉnh sửa thông tin tài khoản với dữ liệu của tài khoản hiện tại
            include_once 'app/views/account/profile.php';
        } else {
            // Xử lý khi không tìm thấy tài khoản
            echo "Không tìm thấy tài khoản!";
        }
    }   
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Nhận dữ liệu từ form chỉnh sửa
            $email = $_POST['email'];
            $fullName = $_POST['fullname'];
            $password = $_POST['password'];
            
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            
            // Lấy tên người dùng từ session
            $username = $_SESSION['username'];
            
            // Gọi hàm cập nhật thông tin tài khoản từ AccountModel
            $result = $this->accountModel->save( $email,$username, $fullName, $hashedPassword);
    
            if ($result) {
                // Nếu cập nhật thành công, chuyển hướng về trang thông tin cá nhân
                header('Location: /shopclothing/product/listProducts');
            } else {
                // Xử lý lỗi nếu cần
                echo "Cập nhật tài khoản không thành công!";
            }
        }
    }
    
    
    

}