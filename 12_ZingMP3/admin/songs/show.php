<?php 
    require_once '../check_admin_signin.php';
    $page = 'songs';
    require_once '../navbar-vertical.php';

    require_once '../../connect.php';
    $id = $_GET['id'];
    $sql = "select *
    from songs
    where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    $sql = "select * from playlists";
    $playlists = mysqli_query($connect, $sql);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <div class="row gx-5">
                   <div class="col-4">
                        <div class="song__img">
                            <img src="../../assets/images/songs/<?= $each['image'] ?>" alt="">
                        </div>
                        <h1 class="song__name">
                            <?= $each['name'] ?>
                        </h1>
                   </div>
                   <div class="col-8">
                       <?php require_once '../error_success.php' ?>
                        <div class="song__media">
                            <img class="song__media-img" src="../../assets/images/songs/<?= $each['image'] ?>" alt="">
                            <div class="song__media-content">
                                <div class="song__media-name">
                                    <?= $each['name'] ?>
                                </div>
                                <div class="song__media-vocalist">
                                    <?= $each['vocalist'] ?>
                                </div>
                            </div>
                            <div class="song__add-to-playlist">
                                <div class="song__add-to-playlist-icon">
                                    <i class="bi bi-plus-circle"></i>
                                    Thêm vào playlist
                                </div>
                                <div class="song__playlist">
                                    <ul class="song__playlist-list">
                                        <?php foreach ($playlists as $playlist) { ?>
                                            <li class="song__playlist-item">
                                                <a href="add_to_playlist.php?id=<?= $id ?>&playlist_id=<?= $playlist['id'] ?>" class="song__playlist-link">
                                                    <i class="bi bi-music-note-list"></i>
                                                    <?= $playlist['name'] ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="song__lyric">
                            <h3>Lời bài hát</h3>
                            <?= nl2br($each['lyric']) ?>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>