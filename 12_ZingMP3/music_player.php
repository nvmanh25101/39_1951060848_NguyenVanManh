<div class="music-player">
    <div class="player-with-thumb">
        <div class="player__thumb">
            <img src="./assets/images/songs/<?= $song_top['song_image'] ?? 'no_song.jpg' ?>" class="player__thumbnail" alt="">
            <div class="player__thumb-action">
                <i class="bi bi-arrows-angle-expand"></i>
            </div>
        </div>

        <div class="player__content">
            <span class="player__title mb-1"><?= $song_top['song_name'] ?? 'Không có bài hát' ?></span>
            <span class="player__subtitle"><?= $song_top['vocalist'] ?? 'Không có bài hát' ?></span>
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
            <div class="player__play d-flex align-items-center justify-content-center">
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
        <audio id="audio" preload="none" src="./assets/audio/<?= $song_top['audio'] ?>" autoplay></audio>
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
            <li class="player__item player__volume">
                <div class="player__volume-icon">
                    <i class="bi bi-volume-mute player__volume-icon-mute"></i>
                    <i class="bi bi-volume-up player__volume-icon-up"></i>
                </div>
                <input id="progress-volume" class="player__actions-progress" type="range" value="0" step="0.1" min="0" max="100">
            </li>
            <li class="player__item">
                <i class="bi bi-music-note-list"></i>
            </li>
        </ul>
    </div>
</div>