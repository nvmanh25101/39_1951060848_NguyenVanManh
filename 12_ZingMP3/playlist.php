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
  <title>Top 100 Âu Mỹ hay nhất</title>
</head>

<body>
  <?php
  $id = $_GET['id'];
  require_once './database/connect.php';
  $sql = "select playlists.*, playlist_song.created_at,
      songs.name as song_name, songs.image as song_image, songs.audio, songs.vocalist, songs.id as song_id
      from playlists
      join playlist_song
      on playlist_song.playlist_id = playlists.id
      join songs
      on playlist_song.song_id = songs.id
      where playlists.id = '$id'";
  $songs = mysqli_query($connect, $sql);
  $song_top = mysqli_fetch_array($songs);
  $sql = "select * from playlists where id = '$id'";
  $playlists = mysqli_query($connect, $sql);
  $playlist = mysqli_fetch_array($playlists);
  ?>
  <main class="app_main">
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
                <div class="playlist__list row d-flex align-center">
                  <ul class="col-12" id="playlist">
                    <?php foreach ($songs as $song) : ?>
                      <li class="row playlist__item">
                        <a href="./assets/audio/<?= $song['audio'] ?>" class="playlist__link">
                          <div class="playlist__content col-7 d-flex align-center">
                            <i class="playlist__icon bi bi-music-note-beamed"></i>
                            <div class="playlist__img">
                              <img src="assets/images/songs/<?= $song['song_image'] ?>" class="playlist__thumb" alt="">
                              <div class="playlist__thumb-icon">
                                <i class="bi bi-play-fill"></i>
                              </div>
                            </div>
                            <div class="playlist__info">
                              <span class="playlist__info-title"><?= $song['song_name'] ?></span>
                              <span class="playlist__info-subtitle"><?= $song['vocalist'] ?></span>
                            </div>
                          </div>
                          <div class="playlist__album col-3">
                            <span><?= $song['name'] ?></span>
                          </div>
                          <div class="playlist__time col-2">
                            02:20
                          </div>
                          <div class="playlist__actions">
                            <i class="bi bi-mic"></i>
                            <i class="bi bi-heart"></i>
                            <div class="playlist__more">
                              <i class="bi bi-three-dots"></i>
                              <?php if (isset($_SESSION['id'])) { ?>
                                <ul class="playlist__more-list">
                                  <li>
                                    <button class="save-song" data-id='<?= $_SESSION['id'] ?>' data-song='<?= $song['song_id'] ?>'>
                                      Lưu bài hát
                                    </button>
                                  </li>
                                </ul>
                              <?php } ?>
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        
          <?php include './template/toast.php'; ?>
        </div>
      </div>
    </div>

    <!-- Music bar -->
    <div class="music-player">
      <div class="player-with-thumb">
        <div class="player__thumb">
          <img src="./assets/images/songs/<?php if(empty($song_top['song_image'])) {
              echo 'no_song.jpg'; 
            } else { 
              echo $song_top['song_image'];} ?>" class="player__thumbnail" alt="">
          <!-- <div class="play__left-img--hover">
                <span class="play__left-img--icon material-icons-outlined">
                  redo
                </span>
              </div> -->
        </div>

        <div class="player__content">
          <span class="player__title mb-1"><?php if(empty($song_top['song_name'])) { 
            echo 'Không có bài hát'; 
            }else { 
              echo $song_top['song_name'];} ?></span>
          <span class="player__subtitle"><?php if(empty($song_top['vocalist'])) { 
            echo 'Không có bài hát'; 
            }else { 
              echo $song_top['vocalist'];} ?></span>
        </div>
        <div class="player__content-icon">
          <i class="player__favorite bi bi-heart"></i>
          <i class="player__more bi bi-three-dots"></i>
        </div>
      </div>

      <div class="player-control">
        <div class="player__actions">
          <div class="player__random d-flex align-items-center justify-content-center">
            <i class="player__actions-icon bi bi-shuffle"></i>
          </div>
          <div class="player__prev d-flex align-items-center justify-content-center">
            <i class="player__actions-icon bi bi-skip-start-fill"></i>
          </div>
          <div class="player__play playing d-flex align-items-center justify-content-center">
            <i class="player__actions-icon play bi bi-play-circle"></i>
            <i class="player__actions-icon pause bi bi-pause-circle"></i>
          </div>
          <div class="player__next d-flex align-items-center justify-content-center">
            <i class="player__actions-icon bi bi-skip-end-fill"></i>
          </div>
          <div class="player__repeat d-flex align-items-center justify-content-center">
            <i class="player__actions-icon bi bi-arrow-repeat"></i>
          </div>
        </div>
        <input id="progress" class="player__actions-progress mt-4" type="range" value="0" step="0.1" min="0" max="100">
        <audio id="audio" preload="none" src="" autoplay></audio>
      </div>

      <div class="player-control-right">
        <ul class="player__list">
          <li class="player__item">
            <i class="bi bi-badge-4k"></i>
          </li>
          <li class="player__item">
            <i class="bi bi-mic"></i>
          </li>
          <li class="player__item">
            <i class="bi bi-aspect-ratio"></i>
          </li>
          <li class="player__item">
            <i class="bi bi-volume-up"></i>
            <!-- <input id="progress" class="player__actions-progress mt-4" type="range" value="0" step="0.1" min="0" max="100"> -->
          </li>
          <li class="player__item">
            <i class="bi bi-music-note-list"></i>
          </li>
        </ul>
      </div>
    </div>

  </main>
  <script src="./assets/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      let audio = $('#audio');
      let playlist = $('#playlist');
      let tracks = playlist.find('.playlist__link');
      let current = 0;
      let thumb = playlist.find('.playlist__img');
      let song_time = playlist.find('.playlist__time');
      let play_btn = $(".player__play");
      let progress = $("#progress");
      let song_thumb = $(".playlist__thumb");
      let song_title = $(".playlist__info-title");
      let song_subtitle = $(".playlist__info-subtitle");
      let player_thumb = $(".player__thumbnail")
      let player_title = $(".player__title")
      let player_subtitle = $(".player__subtitle")
      let player_play = $(".player__play")
      let is_playing = false;
      init();

      function init() {
        len = tracks.length - 1;
        audio[0].volume = 1;
        audio[0].play();

        song_time.text(audio[0].duration)

        tracks.click(function(e) {
          e.preventDefault();
          // link = $(this);
          // current = link.parent().index();
          // thumb.click(function() {
          //   run(link, audio[0]);
          //   is_playing = true;
          //   get_info(current);
          //   $(player_play).addClass('playing')
          //   song_time.text(audio[0].duration)
          // })
        });

        thumb.click(function() {
          par = $(this).parents();
          link = $(par[1]);
          current = $(par[2]).index();
          $(par[1]).addClass('active').siblings().removeClass('active')
          run(link, audio[0])
          is_playing = true
          get_info(current)
          $(player_play).addClass('playing')
        })

        audio[0].addEventListener('ended', function(e) {
          current++;
          if (current == len + 1) {
            current = 0;
            link = tracks[0];
          } else {
            link = tracks[current];
          }
          run($(link), audio[0]);
          is_playing = true;
        })

        // Khi tiến độ bài hát thay đổi
        audio[0].addEventListener('timeupdate', function(e) {
          if (audio[0].duration) {
            let progress_percent = Math.floor(audio[0].currentTime / audio[0].duration * 100);
            progress.val(progress_percent);

            progress.css({
              'backgroundSize': progress_percent + '% 100%'
            })
          }
        })

        // Xử lý khi tua
        progress.on('input', function(e) {
          let seek_time = (e.target.value * audio[0].duration) / 100;
          audio[0].currentTime = seek_time;
        })

        // Xử lý khi click vào nút play
        play_btn.click(function(e) {
          if (is_playing) {
            audio[0].pause();
            is_playing = false;
            $(player_play).removeClass('playing')
          } else {
            audio[0].play();
            is_playing = true;
            $(player_play).addClass('playing')
          }
        })
      }

      function get_info(current) {
        song_thumb = tracks.find('.playlist__thumb')[current].getAttribute('src');
        song_title = tracks.find('.playlist__info-title')[current];
        song_subtitle = tracks.find('.playlist__info-subtitle')[current];
        player_thumb[0].src = song_thumb
        let player_name = player_title[0]
        let player_vocalist = player_subtitle[0]
        $(player_name).text($(song_title).text());
        $(player_vocalist).text($(song_subtitle).text())
      }

      function run(link, player) {
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();
      }

      $(".save-song").click(function() {
        let id = $(this).data('id');
        let song = $(this).data('song');
        $.ajax({
            url: 'save_song.php',
            type: 'POST',
            data: {id, song},
        })

        .done(function(res) {
          if (res == 1) {
            $(".toast-body").text('Lưu thành công');
          } else {
            $(".toast-body").text(res);
          }
        })
      })
      
      $(".save-song").click(function() {
        var toastElList = [].slice.call($('.toast'))
        var toastList = toastElList.map(function(toastEl) {
          return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
      })

    })

  </script>
</body>

</html>