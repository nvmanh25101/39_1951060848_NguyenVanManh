<?php session_start(); 
    if(isset($_SESSION['level'])) {
        header('location:./root');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/signing.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="vh-100 gradient-custom">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">

                <form action="process_signin.php" method="post">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            
                            <?php require_once './error_success.php' ?>
                            <div class="mb-md-5 mt-md-4 pb-5">
        
                                <h2 class="fw-bold mb-2 text-uppercase">đăng nhập admin</h2>
                                <p class="text-white-50 mb-5 fs-4">Hãy nhập email và mật khẩu của bạn!</p>

                                <?php require_once './error_success.php' ?>
                                <div class="mb-4 text-start">
                                    <input type="email" name="email" id="email" class="form__input form-control form-control-lg" autocomplete="off"/>
                                    <label class="form__label form-label fs-4" for="email">Email</label>
                                    <span id="error_email" class="error_input"></span>
                                </div>
            
                                <div class="mb-4 text-start">
                                    <input type="password" name="password" id="password" class="form__input form-control form-control-lg" />
                                    <label class="form__label form-label fs-4" for="password">Mật khẩu</label>
                                    <span id="error_password" class="error_input"></span>
                                </div>
            
                                <button class="btn-signing btn btn-outline-light btn-lg px-5 fs-4" type="submit">Đăng nhập</button>
        
                            </div>
        
                        </div>
                    </div>
                </form>
                
            </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let is_valid = true;

        $("#email").change(function() {
            let regex_email = /^\w{4,30}(@gmail\.com)$/;
            if(!regex_email.test($(this).val())) {
                $("#error_email").text("Email không hợp lệ");
                $(this).addClass('error');
                $(this).focus();
                is_valid = false;
            }
            else {
                $("#error_email").text("");
                $(this).removeClass('error');
                is_valid = true;
            }
        })

        $('#password').change(function() {
            if($(this).val().length > 0) {
            $('#error_password').text('');
            $(this).removeClass('error');
            is_valid = true;
        }
        else {
            $('#error_password').text('Mật khẩu không được để trống');
            $(this).focus();
            $(this).addClass('error');
            is_valid = false;
        }
        })

        $('.btn-signing').click(function(event) {
            if($('#email').val().length === 0 || $('#password').val().length === 0) {
                is_valid = false;
                if($('#email').val().length === 0) {
                    $("#error_email").text("Email không được để trống");
                }
                if($('#error_password').val().length === 0) {
                    $("#error_password").text("Mật khẩu không được để trống");
                }
            
            }
            if(!is_valid) {
                event.preventDefault();
            }
        })

        $(".form__input").change(function() {
                $(this).addClass('active');
        })
    })
</script>
</body>
</html>