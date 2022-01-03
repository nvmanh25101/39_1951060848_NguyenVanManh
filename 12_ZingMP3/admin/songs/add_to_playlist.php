<?php

session_start();
$song_id = $_GET['id'];
if(empty($_GET['playlist_id'])) {
    header("location:show.php?id=$song_id");
    exit();
}

$playlist_id = $_GET['playlist_id'];

require_once '../../connect.php';

$sql = "insert into playlist_song(playlist_id, song_id)
values('$playlist_id', '$song_id')";

if(mysqli_query($connect, $sql)) {
    $_SESSION['success'] = "Đã thêm thành công";
}
else {
    $_SESSION['error'] = "Đã gặp lỗi, vui lòng thử lại";
}

mysqli_close($connect);

header('location:show.php');