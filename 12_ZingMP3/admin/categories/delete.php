<?php 
    require_once '../check_super_admin_signin.php';
if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];

require_once '../../database/connect.php';
$sql = "delete from categories where id = '$id'";

mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);

if(empty($error)) {
    $_SESSION['success'] = 'Đã xóa thành công';
} else {
    $_SESSION['error'] = 'Đã xảy ra lỗi';
}
header('location:index.php');
