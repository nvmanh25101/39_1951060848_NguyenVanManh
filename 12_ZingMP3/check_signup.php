<?php

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    require_once './connect.php';
    
    $sql = "select * from users
    where email= '$email'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0) {
        echo "Email này đã được đăng ký!";
    }
}