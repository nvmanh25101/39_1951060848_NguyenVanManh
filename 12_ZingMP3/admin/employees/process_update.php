<?php

require_once '../check_super_admin_signin.php';

if(empty($_POST['id'])) {
    $_SESSION['error'] = 'Không có dữ liệu để sửa!';
    header('location:index.php');
    exit();
}

$id = $_POST['id'];
if(empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['phone'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin!';
    header("location:form_update.php?id=$id");
    exit();
}

$name = $_POST['name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$image_old = $_FILES['image_old'];
$image_new = $_FILES['image_new'];

if($image_new['size'] > 0) {
    $folder = '../../assets/images/admin/';
    $file_extension = explode('.', $image_new['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1
    $file_name = 'admin_' . time() . '.' . $file_extension; // tránh trùng ảnh
    $path_file = $folder . $file_name;

    move_uploaded_file($image['tmp_name'], $path_file);
}
else {
    $file_name = $image_old;
}

require_once '../../database/connect.php';

$sql = "update admin
set name = ?,
image = ?,
gender = ?,
phone = ?
where id = '$id'";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssis', $name, $file_name, $gender, $phone);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã sửa thành công';

}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header("location:form_update.php?id=$id");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($connect);

header("location:form_update.php?id=$id");