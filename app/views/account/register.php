
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web bán hàng - Đăng ký</title>

    <!-- Custom fonts for this template-->
    <link href="/shopclothing/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/shopclothing/public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <!-- $errors -->
                            <?php
                                if(isset($errors)){
                                    echo "<ul>";
                                    foreach($errors as $err){
                                        echo "<li class='text-danger'>$err</li>";
                                    }
                                    echo "</ul>";
                                }
                            ?>

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản !</h1>
                            </div>
                            
                            <form class="user" action="/shopclothing/account/save" method="post">
                                <div class="form-group">                
                                    <input type="text" class="form-control form-control-user" id="username"
                                        placeholder="Tên đăng nhập" name="username">
                                </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control form-control-user" id="fullname"
                                        placeholder="Họ và tên" name="fullname">
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        placeholder="Email " name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" placeholder="Mật khẩu" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="confirmpassword" placeholder="Xác nhận mật khẩu" name="confirmpassword">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Đăng ký
                                </button>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/shopclothing/account/login">Bạn đã có tài khoản ? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/shopclothing/public/vendor/jquery/jquery.min.js"></script>
    <script src="/shopclothing/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/shopclothing/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/shopclothing/public/js/sb-admin-2.min.js"></script>

</body>

</html>