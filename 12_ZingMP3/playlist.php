<?php 
  session_start();
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

  require_once './template/heading.php';
?>

      <div class="container px-5">
        <div class="row gx-5 mt-4">
          <div class="media col-lg-4 col-12">
            <div class="media__img">
              <img src="assets/images/playlists/<?= $playlist['image'] ?>" alt="">

              <div class="media__icon">
                <i class="bi bi-play-circle"></i>
              </div>
            </div>
            <div class="media__content">
              <h4 class="meida__name"><?= $playlist['name'] ?></h4>
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
          <div class="playlist col-lg-8 col-12">
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