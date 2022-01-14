<?php

try {
    if(empty($_POST['id']) || empty($_POST['song'])) {
        throw new Exception("Đã xảy ra lỗi, vui lòng thử lại sau!");
    }
    $playlist_id = $_POST['id'];
    $song_id = $_POST['song'];

    require_once '../../database/connect.php';

    $sql = "delete from playlist_song
    where playlist_id = '$playlist_id' and song_id = '$song_id'";

    mysqli_query($connect, $sql);
    if(mysqli_error($connect)) {
        throw new Exception("Đã xảy ra lỗi, vui lòng thử lại sau!");
    }
    mysqli_close($connect);
    echo 1;
}
catch (Throwable $e) {
    echo $e->getMessage();
}