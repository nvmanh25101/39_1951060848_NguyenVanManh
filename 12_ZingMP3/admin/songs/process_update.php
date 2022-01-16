<?php

require_once '../check_admin_signin.php';

if(empty($_POST['id'])) {
    $_SESSION['error'] = 'Không có dữ liệu để sửa!';
    header('location:index.php');
    exit();
}

$id = $_POST['id'];
if(empty($_POST['name']) || empty($_POST['lyric']) || empty($_POST['vocalist']) || empty($_POST['category_id']) || empty($_POST['admin_id'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header("location:form_insert.php?id=$id");
    exit();
}

$name = $_POST['name'];
$lyric = $_POST['lyric'];
$vocalist = $_POST['vocalist'];
$category_id = $_POST['category_id'];
$admin_id = $_POST['admin_id'];
$image_old = $_POST['image_old'];
$image_new = $_FILES['image_new'];
$audio_old = $_POST['audio_old'];
$audio_new = $_FILES['audio_new'];

if($image_new['size'] > 0) {
    $folder = '../../assets/images/songs';
    $file_extension = explode('.', $image_new['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1
    $file_name = 'song_' . time() . '.' . $file_extension; // tránh trùng ảnh
    $path_file = $folder . $file_name;

    move_uploaded_file($image_new['tmp_name'], $path_file);
}
else {
    $file_name = $image_old;
}

if($audio_new['size'] > 0) {
    $folder_audio = '../../assets/audio/';
    $file_audio_extension = explode('.', $audio_new['name'])[1]; //explode: cắt chuỗi = dấu . thành mảng lấy vị trí thứ 1
    $file_audio_name = 'song_' . time() . '.' . $file_extension; // tránh trùng ảnh
    $path_audio_file = $folder_audio . $file_audio_name;

    move_uploaded_file($audio_new['tmp_name'], $path_audio_file);
}
else {
    $file_audio_name = $audio_old;
}

require_once '../../database/connect.php';

$sql = "update songs
set name = ?,
image = ?,
audio = ?,
lyric = ?,
vocalist = ?,
category_id = ?
where id = '$id' and admin_id = '$admin_id'";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssssi', $name, $file_name, $file_audio_name, $lyric, $vocalist, $category_id);
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