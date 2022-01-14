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
    <div class="header">
      <div class="header_left">
        <i class="bi bi-arrow-left"></i>
        <i class="bi bi-arrow-right" style="margin-left: 20px;"></i>
      </div>
      <div class="header_search">
        <i class="bi bi-search"></i>
        <input type="text" class="header_search-input" placeholder="Nhập tên bài hát, nghệ sĩ hoặc MV...">
      </div>
      <div class="header_right">
        <div class="header__topic">
          <svg width="20" height="20" class="header__nav-icon" viewBox="0 0 20 20">
            <defs>
              <linearGradient id="j32lhg93hd" x1="62.206%" x2="18.689%" y1="70.45%" y2="39.245%">
                <stop offset="0%" stop-color="#F81212"></stop>
                <stop offset="100%" stop-color="red"></stop>
              </linearGradient>
              <linearGradient id="hjoavsus6g" x1="50%" x2="11.419%" y1="23.598%" y2="71.417%">
                <stop offset="0%" stop-color="#00F"></stop>
                <stop offset="100%" stop-color="#0031FF"></stop>
              </linearGradient>
              <linearGradient id="la1y5u3dvi" x1="65.655%" x2="25.873%" y1="18.825%" y2="56.944%">
                <stop offset="0%" stop-color="#FFA600"></stop>
                <stop offset="100%" stop-color="orange"></stop>
              </linearGradient>
              <linearGradient id="2dsmrlvdik" x1="24.964%" x2="63.407%" y1="8.849%" y2="55.625%">
                <stop offset="0%" stop-color="#13EFEC"></stop>
                <stop offset="100%" stop-color="#00E8DF"></stop>
              </linearGradient>
              <filter id="4a7imk8mze" width="230%" height="230%" x="-65%" y="-65%" filterUnits="objectBoundingBox">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur>
              </filter>
              <filter id="301mo6jeah" width="312.7%" height="312.7%" x="-106.4%" y="-106.4%" filterUnits="objectBoundingBox">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur>
              </filter>
              <filter id="b2zvzgq7fj" width="295%" height="295%" x="-97.5%" y="-97.5%" filterUnits="objectBoundingBox">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur>
              </filter>
              <filter id="a1wq161tvl" width="256%" height="256%" x="-78%" y="-78%" filterUnits="objectBoundingBox">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur>
              </filter>
              <path id="qtpqrj1oda" d="M3.333 14.167V5.833l-1.666.834L0 3.333 3.333 0h3.334c.04 1.57.548 2.4 1.524 2.492l.142.008C9.403 2.478 9.958 1.645 10 0h3.333l3.334 3.333L15 6.667l-1.667-.834v8.334h-10z">
              </path>
              <path id="jggzvnjgfc" d="M0 0H20V20H0z"></path>
              <path id="2eiwxjmc7m" d="M3.333 14.167V5.833l-1.666.834L0 3.333 3.333 0h3.334c.04 1.57.548 2.4 1.524 2.492l.142.008C9.403 2.478 9.958 1.645 10 0h3.333l3.334 3.333L15 6.667l-1.667-.834v8.334h-10z">
              </path>
            </defs>
            <g fill="none" fill-rule="evenodd" transform="translate(2 3)">
              <mask id="tinejqaasb" fill="#fff">
                <use xlink:href="#qtpqrj1oda"></use>
              </mask>
              <use fill="#FFF" fill-opacity="0" xlink:href="#qtpqrj1oda"></use>
              <g mask="url(#tinejqaasb)">
                <g transform="translate(-2 -3)">
                  <mask id="uf3ckvfvpf" fill="#fff">
                    <use xlink:href="#jggzvnjgfc"></use>
                  </mask>
                  <use fill="#D8D8D8" xlink:href="#jggzvnjgfc"></use>
                  <circle cx="8.9" cy="6.8" r="9" fill="url(#j32lhg93hd)" filter="url(#4a7imk8mze)" mask="url(#uf3ckvfvpf)"></circle>
                  <circle cx="9.3" cy="13.7" r="5.5" fill="url(#hjoavsus6g)" filter="url(#301mo6jeah)" mask="url(#uf3ckvfvpf)"></circle>
                  <circle cx="15.9" cy="6.9" r="6" fill="url(#la1y5u3dvi)" filter="url(#b2zvzgq7fj)" mask="url(#uf3ckvfvpf)"></circle>
                  <circle cx="16.4" cy="17.7" r="7.5" fill="url(#2dsmrlvdik)" filter="url(#a1wq161tvl)" mask="url(#uf3ckvfvpf)"></circle>
                </g>
              </g>
              <use fill="#FFF" fill-opacity="0.05" xlink:href="#2eiwxjmc7m"></use>
            </g>
          </svg>
        </div>
        <div class="header__upload" , title="Tải lên">
          <span class="material-icons-outlined">file_upload</span>
        </div>
        <div class="header__setting" , title="Cài đặt">
          <span class="material-icons-outlined">settings</span>
        </div>
        <div class="header__avatar">
          <i class="bi bi-person-circle" style="color: #cdd6da;"></i>
        </div>
      </div>
    </div>
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
                            <span>02:20</span>
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
        <audio id="audio" preload="none" src="./assets/audio/<?php if(empty($song_top['audio'])) {
              echo 'song_1641111650.mp3'; 
            } else { 
              echo $song_top['audio'];} ?>" autoplay></audio>
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
      let audio;
      let playlist;
      let tracks;
      let current;
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
      // audio[0].setAttribute('src', $('.playlist__link').attr('href'));
      // audio[0].load();
      // audio[0].play();
      function init() {
        current = 0;
        audio = $('#audio');
        playlist = $('#playlist');
        tracks = playlist.find('.playlist__link');
        thumb = playlist.find('.playlist__img');
        len = tracks.length - 1;
        audio[0].volume = 1;
        audio[0].play();

        tracks.click(function(e) {
          e.preventDefault();
          link = $(this);
          current = link.parent().index();
          let playlist_img = $(this).find('.playlist__img')
          $(playlist_img).click(function() {
            run(link, audio[0]);
            is_playing = true;
            get_info(current);
            $(player_play).addClass('playing')
          })
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
            data: {
              id,
              song
            },
          })

          .done(function(res) {
            if (res == 1) {
              $(".toast-body").text('Lưu thành công');
            } else {
              $(".toast-body").text(res);
            }
          })
      })
    })

    document.querySelector(".save-song").onclick = function() {
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
      })
      toastList.forEach(toast => toast.show())
    }
  </script>
</body>

</html>