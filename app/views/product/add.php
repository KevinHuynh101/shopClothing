<?php include_once 'app/views/share/header.php'; ?>

<?php
if(isset($errors)){
    echo "<ul>";
    foreach($errors as $err){
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}
?>

<div class="card-body p-5">
     <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Thêm sản phẩm</h1>
    </div>
    <form class="user" action="/shopclothing/product/save" method="post" enctype="multipart/form-data">
        
    <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="fullname">Tên sản phẩm :</label><br>
                <input type="text" class="form-control form-control-user" id="name" name="name" >
            </div>
            <div class="col-sm-6">
                <label for="fullname">Giá :</label><br>
                <input type="number" class="form-control form-control-user" id="price" name="price" >
            </div>
        </div>
        <div class="form-group">
            <label for="fullname">Chi tiết sản phẩm</label><br>
            <input type="text" class="form-control form-control-user" id="description" name="description">
        </div>


        <div class="form-group row">
            <div class="col-sm-4">
                <label for="fullname">Hình ảnh</label><br>
                <input type="file" class="form-control-file image-input" id="image" name="image">
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="category">Loại sản phẩm:</label><br>
                <select id="category" name="category"  >
                    <option value="">Chọn loại sản phẩm</option> 
                    <option value="Áo thun">Áo thun </option> 
                    <option value="Áo sơ mi" >Áo sơ mi</option>
                    <option value="Quần kaki">Quần kaki</option>
                    <option value="Quần ngắn">Quần ngắn</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label for="discount">Giảm giá (%):</label><br>
                <select id="discount" name="discount">
                    <option value="0">Chọn mức giảm giá</option>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                    <option value="40">40%</option>
                    <option value="50">50%</option>
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
<?php include_once 'app/views/share/footer.php'; ?>
