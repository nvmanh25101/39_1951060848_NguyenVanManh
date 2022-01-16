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
                                <ul class="playlist__more-list">
                                    <li>
                                        <button class="save-song" data-id='<?= $_SESSION['id'] ?>' data-song='<?= $song['song_id'] ?>'>
                                            Lưu bài hát
                                        </button>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>