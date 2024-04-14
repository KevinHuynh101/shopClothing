<?php
class ProductController
{

    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    public function listProducts()
    {

        //$stmt = $this->productModel->readAll();
        $products = $this->productModel->readAll();
        include_once 'app/views/share/index.php';
    }

    public function add()
    {
        include_once 'app/views/product/add.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category = $_POST['category'] ?? '';
            $discount = $_POST['discount'] ?? '';

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }

            $uploadResult = false;
            if (!empty($_FILES["image"]['size'])) {
                $uploadResult = $this->uploadImage($_FILES["image"]);
            }

            if (!isset($id)) {
                $result = $this->productModel->createProduct($name, $description, $price, $uploadResult, $category, $discount);
            } else {
                // Update sản phẩm
                $result = $this->productModel->updateProduct($id, $name, $description, $price, $uploadResult, $category, $discount);
            }

            if (is_array($result)) {
                $errors = $result;
                include 'app/views/product/add.php';
            } else {
                header('Location: /shopclothing');
            }
        }
    }

    //hàm upload hình ảnh lên thư mục uploads của server
    public function uploadImage($file) {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        if ($file["size"] > 500000) {
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                return false;
            }
        }
    
    }


    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);

        if (empty($product)) {
            include_once 'app/views/share/not-found.php';
        } else {
            include_once 'app/views/product/edit.php';
        }
    }

    public function delete($id) {
        if ($this->productModel->delete($id)) {
            // Nếu xóa thành công, chuyển hướng người dùng đến trang danh sách sản phẩm hoặc trang chính
            header('Location: /shopclothing/product/listProducts');
        } else {
            // Xử lý khi không thể xóa sản phẩm
            echo "Không thể xóa sản phẩm.";
        }
    }
    

}
