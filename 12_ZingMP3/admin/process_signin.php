<?php

session_start();

if(empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'] = 'Nhập đầy đủ thông tin';
    header('location:index.php');
    exit();
}

$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES); //chuyển '' và ""

require_once '../database/connect.php';

$sql = "select * from admin
where email = ?";

$stmt = mysqli_prepare($connect, $sql);

if($stmt){
    // Liên kết biến với tham số trong câu lệnh đã chuẩn bị
    mysqli_stmt_bind_param($stmt, "s", $email);
    
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $ad_id, $ad_name, $ad_email, $ad_password, $ad_img, $ad_gender, $ad_phone, $ad_level);
            if(mysqli_stmt_fetch($stmt)) {
                if(password_verify($password, $ad_password)) {
                    $_SESSION['id'] = $ad_id;
                    $_SESSION['name'] = $ad_name;
                    $_SESSION['image'] = $ad_img;
                    $_SESSION['level'] = $ad_level;
                    header('location:root/index.php');
                    exit();

                } else{
                    $_SESSION['error'] = 'Sai mật khẩu rùi!';
                }
            }
        } else {
            $_SESSION['error'] = 'Hãy kiểm tra lại email và mật khẩu của bạn!';
        }
    }

} else{
    $_SESSION['error'] = 'Không thể kết nối tới hệ thống!';
}
 
// Đóng câu lệnh
mysqli_stmt_close($stmt);
mysqli_close($connect);

header('location:index.php');

