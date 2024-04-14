<?php
class AccountModel{
    private $conn;
    private $table_name = "account";

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAccountByUsername($username){
        $query = "SELECT * FROM " . $this->table_name . " where name = :username";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":username", $username);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function save($email,$username, $name, $password, $role="user"){

        $query = "INSERT INTO " . $this->table_name . " (email, name, fullname, password, role) VALUES (:email, :username, :name, :password, :role)";
        
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $username = htmlspecialchars(strip_tags($username));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getAllAccounts() {
        $query = "SELECT id, email, name, role, fullname,password FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteAccount($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateAccount($username, $email, $fullname, $password) {
        // Kiểm tra xem người dùng có nhập mật khẩu mới hay không
        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE " . $this->table_name . " SET email = :email, fullname = :fullname, password = :password WHERE name = :username";
        } else {
            $query = "UPDATE " . $this->table_name . " SET email = :email, fullname = :fullname WHERE name = :username";
        }
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fullname', $fullname);
        
        // Nếu có mật khẩu mới, thì gán vào câu lệnh SQL
        if (!empty($password)) {
            $stmt->bindParam(':password', $password);
        }
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    
}