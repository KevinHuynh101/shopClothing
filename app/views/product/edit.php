<?php
include_once 'app/views/share/header.php';
?>

<?php

if (isset($errors)) {
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}

?>

<div class="card-body p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Sửa sản phẩm</h1>
    </div>
    <form class="user" action="/shopclothing/product/save" method="post" enctype="multipart/form-data">
        <!-- đang edit cho sản phẩm  -->
        <input type="hidden" name="id" value="<?=$product->id?>">

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="discount">Tên sản phẩm :</label><br>
                <input value="<?= $product->name ?>" type="text" class="form-control form-control-user" id="name" name="name">
            </div>
            <div class="col-sm-6">
                <label for="discount">Giá :</label><br>
                <input value="<?= $product->price ?>" type="number" class="form-control form-control-user" id="price" name="price" placeholder="Product Price">
            </div>
        </div>
        <div class="form-group">
            <label for="discount">Chi tiết sản phẩm :</label><br>
            <input value="<?= $product->description ?>" type="text" class="form-control form-control-user" id="description" name="description" placeholder="Product Description">
        </div>

        <!-- hien thi hinh anh  -->
        <div class="form-group">
            <label for="discount">Hình ảnh:</label><br>
            <?php
            if (empty($product->image) || !file_exists($product->image)) {
                echo "No Image!";
            } else {
                echo "<img src='/shopclothing/" . $product->image . "' alt='' />";
            }
            ?>
        </div>


        <div class="form-group">
            <input type="file" class="form-control-file image-input" id="image" name="image">
        </div>

        <div class="form-group row">
        <div class="col-sm-6 ">
            <label for="category">Loại sản phẩm:</label><br>
            <select id="category" name="category"  >
                <option value="">Chọn loại sản phẩm</option> 
                <option value="Áo thun" <?php echo ($product->category == "Áo thun") ? "selected" : ""; ?>>Áo thun</option> 
                <option value="Áo sơ mi" <?php echo ($product->category == "Áo sơ mi") ? "selected" : ""; ?>>Áo sơ mi</option> 
                <option value="Quần kaki" <?php echo ( $product->category == "Quần kaki") ? "selected" : ""; ?>>Quần kaki</option>
                <option value="Quần ngắn" <?php echo ( $product->category == "Quần ngắn") ? "selected" : ""; ?>>Quần ngắn</option>
            </select>
        </div>

        <div class="col-sm-6">
            <label for="discount">Giảm giá (%):</label><br>
            <select id="discount" name="discount">
                <option value="">Chọn mức giảm giá</option>
                <option value="10" <?php echo ($product->discount == "10") ? "selected" : ""; ?>>10%</option>
                <option value="20" <?php echo ($product->discount == "20") ? "selected" : ""; ?>>20%</option>
                <option value="30" <?php echo ($product->discount == "30") ? "selected" : ""; ?>>30%</option>
                <option value="40" <?php echo ($product->discount == "40") ? "selected" : ""; ?>>40%</option>
                <option value="50" <?php echo ($product->discount == "50") ? "selected" : ""; ?>>50%</option>
            </select>

        </div>
        </div>



        <div class="form-group text-center">
            <button class="btn btn-primary btn-icon-split p-3">
                Lưu sản phẩm    
            </button>
        </div>
    </form>

</div>
<?php
include_once 'app/views/share/footer.php';
?>