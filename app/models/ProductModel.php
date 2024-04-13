<?php
class ProductModel {
    private $conn;
    private $table_name = "products";

    public function __construct($db) {
        $this->conn = $db;
    }

    function readAll() {
        $query = "SELECT id, name, description, price, image, category, discount FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function getProductById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function createProduct($name, $description, $price, $uploadResult, $category, $discount) {
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Tên sản phẩm không được để trống';
        }
        if (empty($description)) {
            $errors['description'] = 'Mô tả không được để trống';
        }
        if (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Giá sản phẩm không hợp lệ';
        }
        if ($uploadResult == false) {
            $errors['image'] = 'Vui lòng chọn hình ảnh hợp lệ!';
        }

        if (count($errors) > 0) {
            return $errors;
        }

        $query = "INSERT INTO " . $this->table_name . " (name, description, price, image, category, discount) VALUES (:name, :description, :price, :image, :category, :discount)";
        $stmt = $this->conn->prepare($query);

        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        $price = htmlspecialchars(strip_tags($price));
        $category = htmlspecialchars(strip_tags($category));
        $discount = htmlspecialchars(strip_tags($discount));

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $uploadResult);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':discount', $discount);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function updateProduct($id, $name, $description, $price, $uploadResult, $category, $discount) {
        if ($uploadResult) {
            $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description, price=:price, image=:image, category=:category, discount=:discount WHERE id=:id";
        } else {
            $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description, price=:price, category=:category, discount=:discount WHERE id=:id";
        }

        $stmt = $this->conn->prepare($query);
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        $price = htmlspecialchars(strip_tags($price));
        $category = htmlspecialchars(strip_tags($category));
        $discount = htmlspecialchars(strip_tags($discount));

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':discount', $discount);

        if ($uploadResult) {
            $stmt->bindParam(':image', $uploadResult);
        }

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
