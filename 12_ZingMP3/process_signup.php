<?php
session_start();
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || $_FILES['image']['size'] == 0) {
    $_SESSION['error'] = 'Bạn chưa điền đủ thông tin!';
    header('location:signup.php');
    exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$image = $_FILES['image'];
$file_extension = explode('.', $image['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1
$file_type = array("jpg", "jpeg", "png");

if(!in_array("$file_extension", $file_type)) {
    $_SESSION['error'] = 'Chỉ cho phép file dạng .JPG, .PNG, .JPEG'; 
    header('location:signup.php');
    exit();
}

if ($image["size"] > 1000000) {
    $_SESSION['error'] = 'File của bạn quá lớn!'; 
    header('location:signup.php');
    exit();
}

$folder = './assets/images/';
$file_name = 'user_' . time() . '.' . $file_extension; // tránh trùng ảnh
$path_file = $folder . $file_name;

move_uploaded_file($image['tmp_name'], $path_file);

require_once './connect.php';
$sql = "select count(*) from users where email = '$email'";
$result = mysqli_query($connect, $sql);
$num_rows = mysqli_fetch_array($result)['count(*)'];

if($num_rows == 1) {
    $_SESSION['error'] = 'Email này đã được đăng ký!';
    header('location:signup.php');
    exit;
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into users(name, image, email, password)
values(?, ?, ?, ?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $file_name, $email, $password_hash);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đăng ký thành công';
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header('location:signup.php');
    exit();
}


mysqli_stmt_close($stmt);
mysqli_close($connect);

header('location:index.php');