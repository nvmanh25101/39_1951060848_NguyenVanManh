<?php
require_once '../check_admin_signin.php';

if(empty($_POST['name']) || empty($_POST['lyric']) || empty($_POST['vocalist']) || !isset($_POST['category_id']) || $_FILES['image']['size'] == 0 || $_FILES['audio']['size'] == 0) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
    header('location:form_insert.php');
    exit();
}


$name = $_POST['name'];
$image = $_FILES['image'];
$audio = $_FILES['audio'];
$lyric = $_POST['lyric'];
$vocalist = $_POST['vocalist'];
$category_id = $_POST['category_id'];
$admin_id = $_POST['admin_id'];


$folder = '../../assets/images/';
$file_extension = explode('.', $image['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1
$file_type = array("jpg", "jpeg", "png");

if(!in_array("$file_extension", $file_type)) {
    $_SESSION['error'] = 'Chỉ cho phép file dạng .JPG, .PNG, .JPEG'; 
    header('location:form_insert.php');
    exit();
}

if ($image["size"] > 500000) {
    $_SESSION['error'] = 'File của bạn quá lớn!'; 
    header('location:form_insert.php');
    exit();
}

$file_name = 'admin_' . time() . '.' . $file_extension; // tránh trùng ảnh
$path_file = $folder . $file_name;

move_uploaded_file($image['tmp_name'], $path_file);

require_once '../../connect.php';

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into admin(name, email, password, image, gender, phone, level)
values(?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssssisi', $name, $email, $password_hash, $file_name, $gender, $phone, $level);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã thêm thành công';
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header('location:form_insert.php');
    exit();
}

header('location:form_insert.php');

mysqli_stmt_close($stmt);
mysqli_close($connect);