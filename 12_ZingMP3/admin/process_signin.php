<?php

session_start();

if(empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'] = 'Nhập đầy đủ thông tin';
    header('location:index.php');
    exit();
}

$email = $_POST['email'];
$password = htmlspecialchars($_POST['password'], ENT_QUOTES); //chuyển '' và ""

require_once '../connect.php';

$sql = "select * from admin
where email= '$email'";

$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result) == 1) {
    $each = mysqli_fetch_array($result);
    if(password_verify($password, $each['password'])) {
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
        $_SESSION['image'] = $each['image'];
        $_SESSION['level'] = $each['level'];
    
        header('location:root/index.php');
        exit();
    }
}


mysqli_close($connect);

$_SESSION['error'] = 'Thông tin không chính xác!';
header('location:index.php');

