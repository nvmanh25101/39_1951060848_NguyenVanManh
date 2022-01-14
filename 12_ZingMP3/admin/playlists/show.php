<?php 
    require_once '../check_admin_signin.php';
    $page = 'playlists';
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

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
                                    <button class="song__delete-from-playlist-btn"
                                        data-id='<?= $id ?>' data-song='<?= $each['id'] ?>'
                                    >
                                        <i class="bi bi-trash"></i>
                                        Xóa khỏi playlist
                                    </button>
                                    
                                </div>
                            </div>
                        <?php } ?>
                   </div>
                </div>
            </div>
            <?php include '../../template/toast.php' ?>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".song__delete-from-playlist-btn").click(function() {
                let btn = $(this);
                let id = $(this).data('id');
                let song = $(this).data('song');
                $.ajax({
                    url: 'delete_from_playlist.php',
                    type: 'POST',
                    data: {id, song},
                })
        
                .done(function(res) {
                if (res == 1) {
                    $(".toast-body").text('Xóa thành công');
                    btn.parents('.song__media').remove();
                } else {
                    $(".toast-body").text(res);
                }
            })
          })
          $(".song__delete-from-playlist-btn").click(function() {
              var toastElList = [].slice.call(document.querySelectorAll('.toast'))
              var toastList = toastElList.map(function(toastEl) {
                  return new bootstrap.Toast(toastEl)
              })
              toastList.forEach(toast => toast.show())
          })
        })

    </script>
</body>

</html>