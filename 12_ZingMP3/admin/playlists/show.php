<?php 
    require_once '../check_admin_signin.php';
    $page = 'playlists';
    require_once '../navbar-vertical.php';

    require_once '../../connect.php';
    $id = $_GET['id'];
    $sql = "select songs.*
    from playlist_song
    join songs
    on songs.id = playlist_song.song_id
    where playlist_id = '$id'";
    $result = mysqli_query($connect, $sql);

    $sql = "select * from playlists where id = '$id'";
    $playlists = mysqli_query($connect, $sql);
    $playlist = mysqli_fetch_array($playlists);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <div class="row gx-5">
                   <div class="col-4">
                        <div class="playlist__img">
                            <img src="../../assets/images/playlists/<?= $playlist['image'] ?>" alt="">
                        </div>
                        <h1 class="playlist__name">
                            <?= $playlist['name'] ?>
                        </h1>
                   </div>
                   <div class="col-8">
                       <?php require_once '../error_success.php' ?>
                       <?php foreach ($result as $each) { ?>
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
                                <div class="song__delete-from-playlist">
                                    <a href="delete_from_playlist.php?id=<?= $id ?>&song_id=<?= $each['id'] ?>" class="song__delete-from-playlist-link">
                                        <i class="bi bi-trash"></i>
                                        Xóa khỏi playlist
                                    </a>
                                    
                                </div>
                            </div>
                        <?php } ?>
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>