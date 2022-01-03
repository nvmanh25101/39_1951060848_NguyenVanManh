<?php

session_start();
$playlist_id = $_GET['id'];
if(empty($_GET['song_id'])) {
    header("location:show.php?id=$playlist_id");
    exit();
}

$song_id = $_GET['song_id'];


require_once '../../connect.php';

$sql = "delete from playlist_song
where playlist_id = '$playlist_id' and song_id = '$song_id'";

if(mysqli_query($connect, $sql)) {
    $_SESSION['success'] = "Đã xóa thành công";
}
else {
    $_SESSION['error'] = "Đã gặp lỗi, vui lòng thử lại";
}

mysqli_close($connect);

header('location:show.php');