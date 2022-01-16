<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Xác thực đăng ký tài khoản</title>
</head>
<body>
<?php
    if($_GET['email'] && $_GET['token'])
    {
        require_once "../database/connect.php";
        $email = $_GET['email'];
        $token_verification = $_GET['token'];
        $sql = "select * from users where email='$email' and token_verification = '$token_verification'";
        $result = mysqli_query($connect,$sql);
        if (mysqli_num_rows($result) === 1) {
            $each = mysqli_fetch_array($result);
            if($each['status'] == 0){
                $sql = "update users set status = '1' 
                where email='$email'";
                mysqli_query($connect,$sql);
                $msg = "Chúc mừng! Email của bạn đã được xác thực.";
            }else{
                $msg = "Bạn đã xác thực email này rồi";
            }
        }
    }
    else {
        $msg = "Đã xảy ra lỗi gì đó, vui lòng thử lại sau!";
    }
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header text-center">
            Xác thực tài khoản người dùng
        </div>
        <div class="card-body">
            <p><?php echo $msg; ?></p>
            <a href="../signin.php" class="d-block">Vui lòng quay lại đăng nhập</a>
        </div>
    </div>
</div>

</body>
</html>