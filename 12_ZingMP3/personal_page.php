
<?php require_once './template/header.php' ?>
        <div class="container-fluid px-4 mt-5 ">
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
            <div class="user__profile-container">
                <div class="user__avatar">
                    <figure class="user__avatar-img">
                        <img src="https://s120-ava-talk.zadn.vn/9/3/2/e/2/120/4b9ba4c1d6f3d74933e81273060ff954.jpg" alt="">
                    </figure>
                </div>
                <h3 class="title">Phạm Vân Ly</h3>
                <div class="user__profile-actions">
                    <a class="user-btn user-btn user-rounded vip-btn  user-small  " tabindex="0" href="" target="_blank">Nâng Cấp VIP</a>
                    <a class="user-btn user-btn user-rounded vip-code-btn user-small " tabindex="0" href="" target="_blank">Nhập code vip</a>
                    <span class="user__profile-btn">
                        <button class="user-btn2  user-btn-more " tabindex="0">
                            <span class="material-icons-outlined">
                                more_horiz
                            </span>
                        </button>
                    </span>
                </div>
                <nav class="user-navbar user-profile-navbar is-oval  user-navbar-wrap ">
                    <div class="user-narbar-container">
                        <ul class="user-navbar-menu">
                            <li class="user-navbar-item is-active">
                                <div class="navbar-link"><a class="" href="">TỔNG QUAN</a>
                                </div>
                            </li>
                            <li class="user-navbar-item">
                                <div class="navbar-link">
                                    <a class="" href="">BÀI HÁT</a>
                                </div>
                            </li>
                            <li class="user-navbar-item">
                                <div class="navbar-link">
                                    <a class="" href="">PLAYLIST</a>
                                </div>
                            </li>
                            <li class="user-navbar-item">
                                <div class="navbar-link">
                                    <a class="" href="">NGHỆ SĨ</a>
                                </div>
                            </li>
                            <li class="user-navbar-item btn-dropdown">
                                <button class="user-navbar-btn button" tabindex="0">
                                    <span class="material-icons-outlined">
                                        more_horiz
                                    </span>

                                </button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container mymusic-song-view">
                <div class="container library-song-list">
                    <div class="song-list-header">
                        <h3 class="mar-0 title ">Bài hát</h3>
                        <div class="song-list-right">
                            <input id="up-button" type="" accept="" multiple="" style="display: none;">
                            <label for="up-button">
                                <a class="zm-btn mar-r-15 is-outlined is-small is-upper" tabindex="0">
                                    <span class="song-list-icon material-icons-outlined">
                                        file_upload
                                    </span> <span>Tải lên</span>
                                </a>
                            </label>
                            <button class="zm-btn is-outlined active is-small is-upper " tabindex="0">
                                <span class="material-icons-outlined">
                                    play_arrow
                                </span><span>Phát tất cả</span>
                            </button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            
            <div class="main_article col-11">
            <table class="table">
                    <thead>
                        <tr>
                            <th class="main__list-title" scope="col">Bài hát</th>
                            <th class="main__list-title" scope="col">Album</th>
                            <th class="main__list-title" scope="col">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="main__list">
                                    <i class="fas fa-music"></i>
                                    <img src="assets/images/stay.jpeg" style="width:40px" alt="">
                                    <ul class="main__list-songname">
                                        <li class="main__list-songname--li1">STAY </li>
                                        <li>The Kid LAROI,Justin Bieber</li>
                                    </ul>
                                    <div class="main__list-hover2">
                                        <ul class="main__list-hover2--ul">
                                            <li class="main__list-hover2--li1">
                                                <span class="material-icons-outlined">
                                                    play_arrow
                                                </span>
                                            </li>
                                            <li class="main__list-hover2--li2">
                                                <span class="material-icons-outlined">
                                                    music_video
                                                </span>
                                                <span class="material-icons-outlined">
                                                    favorite_border
                                                </span>
                                                <span class="material-icons-outlined">
                                                    more_horiz
                                                </span>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </th>
                            <td class="main__list-album">STAY(Single)</td>
                            <td class="main__list-album">02:20</td>

                        </tr>
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
                     </tbody>
            </div>

            

            </div>

            <!-- <div class="footer">
                <div class="footer__content">
                    <p>14 bài hát </p>
                    <i class=" footer__content-icon fas fa-circle"></i>
                    <p> 42 phút</p>
                </div>
            </div> -->
        </div>
    </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>