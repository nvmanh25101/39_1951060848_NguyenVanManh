<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/playlist.css">
  <link rel="stylesheet" href="assets/css/music_player.css">
  <title>Top 100 Âu Mỹ hay nhất</title>
</head>

<body>
  <?php
  $id = $_GET['id'];

  $search = '';
  if(isset($_GET['search'])) {
      $search = $_GET['search'];
  }

  require_once './database/connect.php';
  $sql = "select playlists.*, playlist_song.created_at,
      songs.name as song_name, songs.image as song_image, songs.audio, songs.vocalist, songs.id as song_id
      from playlists
      join playlist_song
      on playlist_song.playlist_id = playlists.id
      join songs
      on playlist_song.song_id = songs.id
      where playlists.id = '$id' and songs.name like '%$search%'
      order by song_id desc";

  $songs = mysqli_query($connect, $sql);
  $song_top = mysqli_fetch_array($songs);

  $sql = "select * from playlists where id = '$id'";
  $playlists = mysqli_query($connect, $sql);
  $playlist = mysqli_fetch_array($playlists);
  ?>

    <!-- Side bar -->
    <?php require './template/navbar.php' ?>
    <!-- Header -->
    <?php require './template/header.php' ?>
    <!-- Main container -->
    <div class="main__container">
      <div class="container px-5">
        <div class="row gx-5 mt-4">
          <div class="main_article col-4">
            <div class="main_article-img">
              <img src="assets/images/playlists/<?= $playlist['image'] ?>" alt="">

              <div class="main_article-icon">
                <i class="bi bi-play-circle"></i>
              </div>
            </div>
            <div class="main_article-object">
              <a class="main_article-title" href="">
                <h4><?= $playlist['name'] ?></h4>
              </a>
              <p class="main_article-topic">332K người yêu thích</p>
              <button class="btnContinute">
                <span class="material-icons-outlined">
                  play_circle_filled
                </span>
                <p>TIẾP TỤC PHÁT</p>
              </button>
            </div>

          </div>
          <!-- Main list -->
          <div class="playlist col-8">
            <div class="row">
              <div class="col-12">
                <div class="playlist__header row d-flex align-center">
                  <div class="playlist__header-name col-7">
                    Bài hát
                  </div>
                  <div class="playlist__header-album col-3">
                    Album
                  </div>
                  <div class="playlist__header-time col-2">
                    Thời gian
                  </div>
                </div>
              </div>
              <div class="col-12">
               <?php require_once './song_list.php' ?>
              </div>
            </div>
          </div>
        
          <?php include './template/toast.php'; ?>
        </div>
      </div>
    </div>

    <!-- Music bar -->
    <?php require './music_player.php'; ?>

  </main>
  <script src="./assets/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./assets/js/music_player.js"></script>
</body>

</html>