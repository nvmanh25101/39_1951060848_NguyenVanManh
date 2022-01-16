<?php session_start();
    if(empty($_SESSION['id'])) {
        header('location:index.php');
        exit();
    }

    $search = '';
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    $id = $_SESSION['id'];
    require_once './database/connect.php';
    $sql = "select songs.name as song_name, songs.image as song_image, songs.audio, songs.vocalist, songs.id as song_id
     from songs
    join saved_songs
    on saved_songs.song_id = songs.id 
    where saved_songs.user_id = '$id' and name like '%$search%'
    order by songs.id desc";
    $songs = mysqli_query($connect, $sql);
    $song_top = mysqli_fetch_array($songs);

    require_once './template/heading.php';
?>
        <div class="container-fluid px-5">
            <div class="user__profile-container">
                <div class="user__avatar">
                    <figure class="user__avatar-img">
                        <img src="./assets/images/users/<?= $_SESSION['image'] ?>" alt="">
                    </figure>
                </div>
                <h3 class="title"><?= $_SESSION['name'] ?></h3>
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
                            <li class="user-navbar-item">
                                <div class="navbar-link"><a class="" href="">TỔNG QUAN</a>
                                </div>
                            </li>
                            <li class="user-navbar-item is-active">
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
                                </span>
                                <span>Phát tất cả</span>
                            </button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <div class="playlist col-12 mt-5">
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
            <?php include './template/toast.php' ?>
            <?php require_once './music_player.php' ?>
        </div>
    </div>
    </main>
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./assets/js/music_player.js"></script>
</body>

</html>