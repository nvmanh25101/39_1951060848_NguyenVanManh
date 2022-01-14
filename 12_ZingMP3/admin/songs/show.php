<?php 
    require_once '../check_admin_signin.php';
    $page = 'songs';
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

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
                                                <button class="song__playlist-btn"
                                                    data-id='<?= $id ?>' data-playlist='<?= $playlist['id'] ?>'
                                                >
                                                    <i class="bi bi-music-note-list"></i>
                                                    <?= $playlist['name'] ?>
                                                </button>
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
                <?php include '../../template/toast.php' ?>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".song__playlist-btn").click(function() {
            let id = $(this).data('id');
            let playlist = $(this).data('playlist');
            $.ajax({
                url: 'add_to_playlist.php',
                type: 'POST',
                data: {id, playlist},
            })
    
            .done(function(res) {
            if (res == 1) {
                $(".toast-body").text('Thêm thành công');
            } else {
                $(".toast-body").text(res);
            }
            })
          })
          $(".song__playlist-btn").click(function() {
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