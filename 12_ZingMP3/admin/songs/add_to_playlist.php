<?php

try {
    if(empty($_POST['id']) || empty($_POST['playlist'])) {
        throw new Exception("Đã xảy ra lỗi, vui lòng thử lại sau!");
    }
    $song_id = $_POST['id'];
    $playlist_id = $_POST['playlist'];

    require_once '../../database/connect.php';

    $sql = "insert into playlist_song(playlist_id, song_id)
    values('$playlist_id', '$song_id')";

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