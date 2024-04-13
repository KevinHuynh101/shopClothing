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
}