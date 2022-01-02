<?php
require_once '../check_super_admin_signin.php';

if(empty($_POST['name']) || $_FILES['image']['size'] == 0) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
    header('location:form_insert.php');
    exit();
}


$name = $_POST['name'];
$image = $_FILES['image'];
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

$folder = '../../assets/images/categories/';
$file_name = 'category_' . time() . '.' . $file_extension; // tránh trùng ảnh
$path_file = $folder . $file_name;

move_uploaded_file($image['tmp_name'], $path_file);

require_once '../../connect.php';

$sql = "insert into categories(name, image)
values(?, ?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'ss', $name, $file_name);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã thêm thành công';
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header('location:form_insert.php');
    exit();
}


mysqli_stmt_close($stmt);
mysqli_close($connect);

header('location:form_insert.php');