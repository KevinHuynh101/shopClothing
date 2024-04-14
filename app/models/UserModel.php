<?php
class UserModel {
    private $conn;
    private $table_name = "products";

    public function __construct($db) {
        $this->conn = $db;
    }
// chỉ lấy 8 kết quả
    function readAll() {
        $query = "SELECT id, name, description, price, image, category, discount FROM " . $this->table_name . " LIMIT 8";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }
    
    public function getProductById($id) {
        $query = "SELECT id, name, description, price, image, category, discount FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}