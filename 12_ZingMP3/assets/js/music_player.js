
$(document).ready(function() {
  let audio = $('#audio');
  let playlist = $('#playlist');
  let tracks = playlist.find('.playlist__link');
  let current = 0;
  let thumb = playlist.find('.playlist__img');
  let song_time = playlist.find('.playlist__time');
  let play_btn = $(".player__play");
  let progress = $("#progress");
  let song_thumb = $(".playlist__thumb");
  let song_title = $(".playlist__info-title");
  let song_subtitle = $(".playlist__info-subtitle");
  let player_thumb = $(".player__thumbnail")
  let player_title = $(".player__title")
  let player_subtitle = $(".player__subtitle")
  let player_play = $(".player__play")
  let is_playing = false;
  // tracks.each(function() {
  //   audio[0].src = $(this).attr("src")
  //   song_time.text(Math.round((audio[0].duration / 60) * 100) / 100)
  // })
  init();


  function init() {
    len = tracks.length - 1;
    audio[0].volume = 1;
    audio[0].play();
    is_playing = true;
    $(player_play).addClass('playing')

    
    song_time.text(Math.round((audio[0].duration / 60) * 100) / 100)

    tracks.click(function(e) {
      e.preventDefault();
      // link = $(this);
      // current = link.parent().index();
      // thumb.click(function() {
      //   run(link, audio[0]);
      //   is_playing = true;
      //   get_info(current);
      //   $(player_play).addClass('playing')
      //   song_time.text(audio[0].duration)
      // })
    });

    thumb.click(function() {
      par = $(this).parents();
      link = $(par[1]);
      current = $(par[2]).index();
      $(par[1]).addClass('active').siblings().removeClass('active')
      run(link, audio[0])
      is_playing = true
      get_info(current)
      $(player_play).addClass('playing')
    })

    audio[0].addEventListener('ended', function(e) {
      current++;
      if (current == len + 1) {
        current = 0;
        link = tracks[0];
      } else {
        link = tracks[current];
      }
      run($(link), audio[0]);
      is_playing = true;
    })

    // Khi tiến độ bài hát thay đổi
    audio[0].addEventListener('timeupdate', function(e) {
      if (audio[0].duration) {
        let progress_percent = Math.floor(audio[0].currentTime / audio[0].duration * 100);
        progress.val(progress_percent);

        progress.css({
          'backgroundSize': progress_percent + '% 100%'
        })
      }
    })

    // Xử lý khi tua
    progress.on('input', function(e) {
      let seek_time = (e.target.value * audio[0].duration) / 100;
      audio[0].currentTime = seek_time;
    })

    // Xử lý khi click vào nút play
    play_btn.click(function(e) {
      if (is_playing) {
        audio[0].pause();
        is_playing = false;
        $(player_play).removeClass('playing')
      } else {
        audio[0].play();
        is_playing = true;
        $(player_play).addClass('playing')
      }
    })
  }

  function get_info(current) {
    song_thumb = tracks.find('.playlist__thumb')[current].getAttribute('src');
    song_title = tracks.find('.playlist__info-title')[current];
    song_subtitle = tracks.find('.playlist__info-subtitle')[current];
    player_thumb[0].src = song_thumb
    let player_name = player_title[0]
    let player_vocalist = player_subtitle[0]
    $(player_name).text($(song_title).text());
    $(player_vocalist).text($(song_subtitle).text())
  }

  function run(link, player) {
    player.src = link.attr('href');
    par = link.parent();
    par.addClass('active').siblings().removeClass('active');
    audio[0].load();
    audio[0].play();
  }

  $(".save-song").click(function() {
    let id = $(this).data('id');
    let song = $(this).data('song');
    $.ajax({
        url: 'save_song.php',
        type: 'POST',
        data: {id, song},
    })

    .done(function(res) {
      if (res == 1) {
        $(".toast-body").text('Lưu thành công');
      } else {
        $(".toast-body").text(res);
      }
    })
  })
  
  $(".save-song").click(function() {
    var toastElList = [].slice.call($('.toast'))
    var toastList = toastElList.map(function(toastEl) {
      return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
  })

})
