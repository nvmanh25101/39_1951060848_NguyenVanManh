<?php 
    require_once '../check_super_admin_signin.php';
if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];

require_once '../../database/connect.php';
$sql = "delete from admin where id = '$id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

$_SESSION['success'] = 'Đã xóa thành công';
header('location:index.php');
