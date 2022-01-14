<?php

try {
    if(empty($_POST['id']) || empty($_POST['song'])) {
        throw new Exception("Không tồn tại người dùng hoặc bài hát");
    }
    $user_id = $_POST['id'];
    $song_id = $_POST['song'];

    require_once './database/connect.php';

    $sql = "insert into saved_songs(user_id, song_id)
    values('$user_id', '$song_id')";

    mysqli_query($connect, $sql);
    if(mysqli_error($connect)) {
        throw new Exception("Đã tồn tại");
    }
    mysqli_close($connect);
    echo 1;
}
catch (Throwable $e) {
    echo $e->getMessage();
}