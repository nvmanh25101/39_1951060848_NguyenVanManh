<?php

require_once './database/connect.php';

$search = '';
if(isset($_GET['search'])) {
    $search = $_GET['search'];
}

$id = $_GET['id'];

$sql = "select songs.name as song_name, songs.image as song_image, songs.audio, songs.vocalist, songs.id as song_id
 from songs
where songs.category_id = '$id' and where songs.name like '%$search%'";
$songs = mysqli_query($connect, $sql);
$song_top = mysqli_fetch_array($songs);

$sql = "select * from categories where id= '$id'";
$categories = mysqli_query($connect, $sql);
$category = mysqli_fetch_array($categories);
require_once './template/heading.php';
?>
<!-- Content -->
<div class="container-fluid px-4">
    <div class="row gx-5 mt-4">
        <div class="media col-4">
            <div class="media__img">
                <img src="assets/images/categories/<?= $category['image'] ?>" alt="Image">

                <div class="media__icon">
                    <i class="bi bi-play-circle"></i>
                </div>
            </div>
            <div class="media__content">
                <h4 class="meida__name"><?= $category['name'] ?></h4>
                <p class="media__favorite">332K người yêu thích</p>
                <button class="media__continute-btn">
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
                                            <span><?= $song['song_name'] ?> (Single)</span>
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

<?php require_once './music_player.php' ?>
</div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="./assets/js/music_player.js"></script>
</body>

</html>