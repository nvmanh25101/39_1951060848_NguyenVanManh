<?php 
    require_once '../check_admin_signin.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}
  
if($_GET['admin_id'] != $_SESSION['id'] || $_SESSION['level'] != 1) {
    $_SESSION['error'] = 'Bạn không có quyền để truy cập';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];
$admin_id = $_GET['admin_id'];
require_once '../../database/connect.php';

$sql = "delete from songs where id = '$id' and admin_id = '$admin_id'";

mysqli_query($connect, $sql);

mysqli_close($connect);

$_SESSION['success'] = 'Đã xóa thành công';
header('location:index.php');
