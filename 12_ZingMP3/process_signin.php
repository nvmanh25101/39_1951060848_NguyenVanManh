<?php
session_start();
if(empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'] = 'Bạn cần điền đầy đủ thông tin!';
    header('location:signin.php');
    exit();
}
$email = $_POST['email'];
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if(isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}

require_once './connect.php';
$sql = "select * from users
where email = ?";

$stmt = mysqli_prepare($connect, $sql);

if($stmt){
    // Liên kết biến với tham số trong câu lệnh đã chuẩn bị
    mysqli_stmt_bind_param($stmt, "s", $email);
    
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $user_id, $user_name, $user_img, $user_email, $user_password, $token);
            if(mysqli_stmt_fetch($stmt)) {
                if(password_verify($password, $user_password)) {
                    $_SESSION['id'] = $user_id;
                    $_SESSION['name'] = $user_name;
                    $_SESSION['image'] = $user_img;
                    if($remember) {
                        $token = uniqid('user_', true) . time();
                        $sql = "update users 
                        set token = '$token'
                        where id = '$user_id'";
                        mysqli_query($connect, $sql);
    
                        setcookie('remember', $token, time() + (86400 * 30));
                    }
                } else{
                    $_SESSION['error'] = 'Sai mật khẩu rùi!';
                    header('location:signin.php');
                    exit();
                }
            }
        } else {
            $_SESSION['error'] = 'Hãy kiểm tra lại email và mật khẩu của bạn!';
            header('location:signin.php');
            exit(); 
        }
    }

} else{
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header('location:signin.php');
    exit();
}
 
// Đóng câu lệnh
mysqli_stmt_close($stmt);

mysqli_close($connect);

header('location:signin.php');