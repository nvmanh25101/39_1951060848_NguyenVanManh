<?php
require_once '../check_admin_signin.php';

if(empty($_POST['name']) || empty($_POST['lyric']) || empty($_POST['vocalist']) || empty($_POST['category_id']) || empty($_POST['admin_id']) || $_FILES['image']['size'] == 0 || $_FILES['audio']['size'] == 0) {
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

// Ảnh
$folder = '../../assets/images/songs/';
$file_extension = explode('.', $image['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1
$file_type = array("jpg", "jpeg", "png");

if ($image["size"] > 500000) {
    $_SESSION['error'] = 'File của bạn quá lớn!'; 
    header('location:form_insert.php');
    exit();
}

if(!in_array("$file_extension", $file_type)) {
    $_SESSION['error'] = 'Chỉ cho phép file dạng .JPG, .PNG, .JPEG'; 
    header('location:form_insert.php');
    exit();
}

$file_name = 'song_' . time() . '.' . $file_extension; // tránh trùng ảnh
$path_file = $folder . $file_name;

move_uploaded_file($image['tmp_name'], $path_file);


// Âm thanh
$folder_audio = '../../assets/audio/';
$file_audio_extension = explode('.', $audio['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1

if($file_audio_extension !== 'mp3') {
    $_SESSION['error'] = 'Chỉ cho phép file dạng .mp3'; 
    header('location:form_insert.php');
    exit();
}

if ($audio["size"] > 5000000) {
    $_SESSION['error'] = 'File của bạn quá lớn!'; 
    header('location:form_insert.php');
    exit();
}


$file_audio_name = 'song_' . time() . '.' . $file_audio_extension; // tránh trùng ảnh
$path_file_audio = $folder_audio . $file_audio_name;

move_uploaded_file($audio['tmp_name'], $path_file_audio);

require_once '../../database/connect.php';

$sql = "insert into songs(name, image, audio, lyric, vocalist, category_id, admin_id)
values(?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssssii', $name, $file_name, $file_audio_name, $lyric, $vocalist, $category_id, $admin_id);
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