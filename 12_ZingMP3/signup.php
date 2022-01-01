<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/signing.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="vh-100 gradient-custom">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
        
                            <div class="mb-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">đăng ký</h2>
                                <p class="text-white-50 mb-5 fs-4">Nhanh chóng và dễ dàng!</p>
                                <?php require './admin/error_success.php' ?>

                                <form action="process_signup.php" method="post" enctype="multipart/form-data">
                                    <div class="text-start">
                                        <input onchange="input_active()" type="text" id="name" name="name" class="form__input form-control form-control-lg" autocomplete="off"/>
                                        <label class="form__label form-label fs-4" for="name">Tên</label>
                                        <span id="error_name" class="error_input"></span>
                                    </div>

                                    <div class="mb-4 text-start">
                                        <label class="form-label fs-4" for="avartar">Ảnh đại diện</label>
                                        <input type="file" id="avatar" name="image" class="form__input form-control form-control-lg" />
                                    </div>

                                    <div class="text-start">
                                        <input onchange="input_active()" type="email" id="email" name="email" class="form__input form-control form-control-lg" autocomplete="off"/>
                                        <label class="form__label form-label fs-4" for="email">Email</label>
                                        <span id="error_email" class="error_input"></span>
                                    </div>
                
                                    <div class="text-start">
                                        <input onchange="input_active()" type="password" id="password" name="password" class="form__input form-control form-control-lg" />
                                        <label class="form__label form-label fs-4" for="password">Mật khẩu</label>
                                        <span id="error_password" class="error_input"></span>
                                    </div>
                
                                    <button class="btn btn-outline-light btn-lg px-5 fs-4" type="submit" onclick="return signup_validate()">Đăng ký</button>
                                 </form>
                                
                            </div>
                            <div>
                                <p class="mb-0 fs-4">Bạn đã có tài khoản? <a href="signin.php" class="text-white-50 fw-bold">Đăng nhập</a></p>
                            </div>
                        </div>
                    </div>
                
            </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./assets/js/signing.js"></script>
</html>