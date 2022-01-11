<?php 
    session_start();

    require_once './connect.php';
    $sql = "select * from playlists";
    $result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <title>Nhạc cá nhân | Xem bài hát, album, MV đang hot nhất hiện tại</title>
</head>
<body>
    <main class="app_main grid">
        <!-- Sidebar -->
        <nav class="navbar navbar-vertical d-block position-fixed top-0 start-0 bottom-0 p-0">
            <div class="navbar__content">
                <a class="navbar-brand px-5 d-block" href="#">
                    <img src="./assets/icon/main-logo.svg" alt="">
                </a>
                <ul class="nav navbar__list1 flex-column">
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link navbar__link--active" href="#">
                            <i class="navbar__link-icon bi bi-music-player"></i>
                            <span>Cá nhân</span> 
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-vinyl"></i>
                            <span>Khám phá</span> 
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-music-note-list"></i>
                            <span>#Zingchart</span> 
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-soundwave"></i>
                            <span>Radio</span> 
                            <div class="nav-item-label">LIVE</div>
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-file-earmark-slides"></i>
                            <span>Theo dõi</span> 
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar__list2 flex-column">
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-music-note-beamed"></i>
                            <span>Nhạc mới</span> 
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="./categories.php">
                            <i class="navbar__link-icon bi bi-slack"></i>
                            <span>Thể Loại</span> 
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-star"></i>
                            <span>Top 100</span> 
                        </a>
                    </li>
                    <li class="nav-item navbar__item">
                        <a class="nav-link d-flex align-items-center navbar__link" href="#">
                            <i class="navbar__link-icon bi bi-camera-video"></i>
                            <span>MV</span> 
                        </a>
                    </li>
                </ul>
                <div class="sidebar__login">
                    <p class="sidebar__login-description">Nghe nhạc không quảng cáo cùng kho nhạc VIP</p>
                    <a href="#" class="sidebar__login-btn button is-small button-gold">Mua vip</a>
                </div>
                <ul class="sidebar__subnav-menu">
                    <li class="sibebar__subnav-content" style="display:flex; margin-bottom:20px;">
                        <h2 class="sidebar__menu-title">Thư viện</h2>
                        <i class="bi bi-pencil" style="color: #cdd6da;"></i>
                    </li>     
                    <li class="sidebar__menu-item">
                        <a href="#" class="sidebar__menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="0783s0j89a" x1="0%" x2="0%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#3CA2FF" />
                                        <stop offset="100%" stop-color="#008FFF" />
                                    </linearGradient>
                                    <linearGradient id="prx3tly02b" x1="21.839%" x2="21.839%" y1="43.679%" y2="100%">
                                        <stop offset="0%" stop-color="#FFF" />
                                        <stop offset="100%" stop-color="#FFF" stop-opacity=".9" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <path
                                                fill="url(#0783s0j89a)"
                                                d="M.516 7.143c.812-3.928 3.31-6.115 7.207-6.776 2.88-.489 5.762-.495 8.637.014 4.012.709 6.424 3.024 7.192 7.011.594 3.082.603 6.196-.009 9.274-.821 3.9-3.384 6.309-7.266 6.967-2.88.489-5.762.495-8.637-.014-4.012-.709-6.435-3.14-7.203-7.127-.624-3.102-.564-6.235.08-9.349z"
                                                transform="translate(-21 -433) translate(21 433)"
                                            />
                                            <path
                                                fill="url(#prx3tly02b)"
                                                d="M3.995 9.479c-.245.48-.245 1.11-.245 2.371v3.3c0 1.26 0 1.89.245 2.371.216.424.56.768.984.984.48.245 1.11.245 2.371.245h9.3c1.26 0 1.89 0 2.372-.245.423-.216.767-.56.983-.983.245-.482.245-1.112.245-2.372v-3.3c0-1.26 0-1.89-.245-2.371-.216-.424-.56-.768-.983-.984-.482-.245-1.112-.245-2.372-.245h-9.3c-1.26 0-1.89 0-2.371.245-.424.216-.768.56-.984.984zm8.567.571l.06.004.068.015.057.02.017.008c.556.27 1.067.623 1.516 1.046.075.07.148.142.22.217.172.18.166.464-.014.636-.18.172-.464.167-.636-.013-.061-.063-.123-.125-.187-.185-.202-.19-.42-.365-.65-.521v3.442c0 1.025-.832 1.856-1.857 1.856S9.3 15.744 9.3 14.719c0-1.025.831-1.856 1.856-1.856.35 0 .677.096.957.264V10.5c0-.249.201-.45.45-.45z"
                                                transform="translate(-21 -433) translate(21 433)"
                                            />
                                            <path fill="#FFF" fill-opacity=".6" fill-rule="nonzero" d="M7.5 5.25c0-.414.336-.75.75-.75h7.5c.414 0 .75.336.75.75h-9z" transform="translate(-21 -433) translate(21 433)" />
                                            <path fill="#FFF" fill-opacity=".9" fill-rule="nonzero" d="M6 6.75c0-.414.336-.75.75-.75h10.5c.414 0 .75.336.75.75H6z" transform="translate(-21 -433) translate(21 433)" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span>Bài hát</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="#" class="sidebar__menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="ghd4ngt38a" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#9FD465" />
                                        <stop offset="100%" stop-color="#70B129" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <path
                                                fill="url(#ghd4ngt38a)"
                                                d="M.516 7.143c.812-3.928 3.31-6.115 7.207-6.776 2.88-.489 5.762-.495 8.637.014 4.012.709 6.424 3.024 7.192 7.011.594 3.082.603 6.196-.009 9.274-.821 3.9-3.384 6.309-7.266 6.967-2.88.489-5.762.495-8.637-.014-4.012-.709-6.435-3.14-7.203-7.127-.624-3.102-.564-6.235.08-9.349z"
                                                transform="translate(-21 -467) translate(21 467)"
                                            />
                                            <path stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 11.5h5m-5 3h5M6 17.5h12.5" transform="translate(-21 -467) translate(21 467)" />
                                            <path
                                                fill="#FFF"
                                                d="M10.786 4.025c-.053-.016-.11-.025-.167-.025-.316 0-.572.262-.572.585v4.782c-.532-.44-1.21-.704-1.948-.704C6.387 8.663 5 10.082 5 11.831 5 13.581 6.387 15 8.099 15c1.711 0 3.099-1.419 3.099-3.169 0-.074-.003-.147-.007-.22l.001-6.04c.534.336 1.033.728 1.49 1.169.114.109.225.22.334.337.218.233.58.24.808.017.228-.223.235-.593.017-.826-.123-.131-.247-.257-.375-.38-.766-.738-1.64-1.355-2.589-1.826l-.091-.037z"
                                                transform="translate(-21 -467) translate(21 467)"
                                            />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            
                            <span>Playlist</span>
                        </a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="#" class="sidebar__menu-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="v6mduhifwa" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#FFD677" />
                                        <stop offset="100%" stop-color="#F7AA45" />
                                    </linearGradient>
                                    <linearGradient id="dkfkk30hhb" x1="21.205%" x2="21.205%" y1="43.042%" y2="100.632%">
                                        <stop offset="0%" stop-color="#FFF" />
                                        <stop offset="100%" stop-color="#FFF" stop-opacity=".9" />
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <path
                                                fill="url(#v6mduhifwa)"
                                                d="M.516 7.143c.812-3.928 3.31-6.115 7.207-6.776 2.88-.489 5.762-.495 8.637.014 4.012.709 6.424 3.024 7.192 7.011.594 3.082.603 6.196-.009 9.274-.821 3.9-3.384 6.309-7.266 6.967-2.88.489-5.762.495-8.637-.014-4.012-.709-6.435-3.14-7.203-7.127-.624-3.102-.564-6.235.08-9.349z"
                                                transform="translate(-21 -569) translate(21 569)"
                                            />
                                            <path
                                                fill="url(#dkfkk30hhb)"
                                                d="M12 3.75c-4.556 0-8.25 3.694-8.25 8.25s3.694 8.25 8.25 8.25 8.25-3.694 8.25-8.25S16.556 3.75 12 3.75zm3.805 12.388c-.13.13-.301.195-.472.195-.17 0-.341-.065-.47-.195l-3.334-3.333c-.126-.125-.196-.294-.196-.472V8c0-.369.299-.667.667-.667.368 0 .667.298.667.667v4.057l3.138 3.138c.26.261.26.682 0 .943z"
                                                transform="translate(-21 -569) translate(21 569)"
                                            />
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            <span>Gần đây</span>
                        </a>
                    </li>
                    <li class="sidebar__create-container">
                        <a href="#" style="color:#cdd6da;">
                            <i class="bi bi-plus-lg"></i>
                        </a>   
                        <h2 class="sidebar__create-title" style="margin-left:20px;">Tạo playlist mới</h2> 
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- Container -->
        <div class="main__container">
            <!-- Header -->
            <div class="header">
                <div class="header_left">
                    <i class="bi bi-arrow-left"></i>
                    <i class="bi bi-arrow-right" style="margin-left: 20px;"></i>
                </div>
                <div class="header_search">
                  <i class="bi bi-search"></i>
                  <input type="text" class="header_search-input" placeholder="Nhập tên bài hát, nghệ sĩ hoặc MV...">
                </div>
                <div class="header_right">
                    <div class="header__topic">
                        <svg width="20" height="20" class="header__nav-icon" viewBox="0 0 20 20"><defs><linearGradient id="j32lhg93hd" x1="62.206%" x2="18.689%" y1="70.45%" y2="39.245%"><stop offset="0%" stop-color="#F81212"></stop><stop offset="100%" stop-color="red"></stop></linearGradient><linearGradient id="hjoavsus6g" x1="50%" x2="11.419%" y1="23.598%" y2="71.417%"><stop offset="0%" stop-color="#00F"></stop><stop offset="100%" stop-color="#0031FF"></stop></linearGradient><linearGradient id="la1y5u3dvi" x1="65.655%" x2="25.873%" y1="18.825%" y2="56.944%"><stop offset="0%" stop-color="#FFA600"></stop><stop offset="100%" stop-color="orange"></stop></linearGradient><linearGradient id="2dsmrlvdik" x1="24.964%" x2="63.407%" y1="8.849%" y2="55.625%"><stop offset="0%" stop-color="#13EFEC"></stop><stop offset="100%" stop-color="#00E8DF"></stop></linearGradient><filter id="4a7imk8mze" width="230%" height="230%" x="-65%" y="-65%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><filter id="301mo6jeah" width="312.7%" height="312.7%" x="-106.4%" y="-106.4%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><filter id="b2zvzgq7fj" width="295%" height="295%" x="-97.5%" y="-97.5%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><filter id="a1wq161tvl" width="256%" height="256%" x="-78%" y="-78%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceGraphic" stdDeviation="3.9"></feGaussianBlur></filter><path id="qtpqrj1oda" d="M3.333 14.167V5.833l-1.666.834L0 3.333 3.333 0h3.334c.04 1.57.548 2.4 1.524 2.492l.142.008C9.403 2.478 9.958 1.645 10 0h3.333l3.334 3.333L15 6.667l-1.667-.834v8.334h-10z"></path><path id="jggzvnjgfc" d="M0 0H20V20H0z"></path><path id="2eiwxjmc7m" d="M3.333 14.167V5.833l-1.666.834L0 3.333 3.333 0h3.334c.04 1.57.548 2.4 1.524 2.492l.142.008C9.403 2.478 9.958 1.645 10 0h3.333l3.334 3.333L15 6.667l-1.667-.834v8.334h-10z"></path></defs><g fill="none" fill-rule="evenodd" transform="translate(2 3)"><mask id="tinejqaasb" fill="#fff"><use xlink:href="#qtpqrj1oda"></use></mask><use fill="#FFF" fill-opacity="0" xlink:href="#qtpqrj1oda"></use><g mask="url(#tinejqaasb)"><g transform="translate(-2 -3)"><mask id="uf3ckvfvpf" fill="#fff"><use xlink:href="#jggzvnjgfc"></use></mask><use fill="#D8D8D8" xlink:href="#jggzvnjgfc"></use><circle cx="8.9" cy="6.8" r="9" fill="url(#j32lhg93hd)" filter="url(#4a7imk8mze)" mask="url(#uf3ckvfvpf)"></circle><circle cx="9.3" cy="13.7" r="5.5" fill="url(#hjoavsus6g)" filter="url(#301mo6jeah)" mask="url(#uf3ckvfvpf)"></circle><circle cx="15.9" cy="6.9" r="6" fill="url(#la1y5u3dvi)" filter="url(#b2zvzgq7fj)" mask="url(#uf3ckvfvpf)"></circle><circle cx="16.4" cy="17.7" r="7.5" fill="url(#2dsmrlvdik)" filter="url(#a1wq161tvl)" mask="url(#uf3ckvfvpf)"></circle></g></g><use fill="#FFF" fill-opacity="0.05" xlink:href="#2eiwxjmc7m"></use></g></svg>
                    </div>
                    <div class="header__upload" , title="Tải lên">
                       <span class="material-icons-outlined">file_upload</span>
                    </div>
                    <div class="header__setting" , title="Cài đặt">
                       <span class="material-icons-outlined">settings</span>
                    </div>
                    <div class="header__avatar">
                        <?php if(isset($_SESSION['id'])) { ?>
                            <img src="./assets/images/users/<?php echo $_SESSION['image']?>" class="header__avatar-img" alt="avatar">
                            <ul class="header__avatar-menu">
                                <li>
                                    <a href="./signout.php" class="header__avatar-link">Đăng xuất</a>
                                </li>
                            </ul>
                        <?php } else {?>
                            <i class="bi bi-person-circle" style="color: #cdd6da;"></i>
                            <ul class="header__avatar-menu">
                                <li>
                                   <a href="./signin.php" class="header__avatar-link">Đăng nhập</a>
                                </li>
                                <li>
                                   <a href="./signup.php" class="header__avatar-link">Đăng ký</a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="container-fluid px-4">
                <div class="main_content">
                    <h5 class="main_text">Lựa chọn hôm nay</h5>
                </div>
                <div class="row gx-5 mt-4">
                    <?php foreach ($result as $each) { ?>
                        <a class="main_article col-md-3">
                            <div  class="main_article-img">
                                <img src="./assets/images/playlists/<?= $each['image'] ?>" style="width:200px" alt="">
                                <div class="main_article-icon">
                                <span class="material-icons-outlined">favorite_border</span>
                                <span class=" material-icons-outlined">play_circle_outline</span>
                                <span class="material-icons-outlined">more_horiz</span>
                                </div>
                            </div>
                            <div  class="main_article-title"><?= $each['name'] ?></div>
                        </a>
                    <?php } ?>
                </div>
                <div class="main_content">
                    <h5 class="main_text" style="width: 300px;">Có thể bạn muốn nghe</h5>
                </div>
                <div class="row row-cols-4 gx-5 mt-4">
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./assets/images/blackpink.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Mở đầu hoàn hảo</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./assets/images/rapviet.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">V-pop: The A-List</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./assets/images/stay.jpeg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Tỏ tình nhẹ nhàng</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./assets/images/usuk-top.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Nhạc US-UK gây nghiện</a>
                    </div>
                </div>
                <div class="main_content">
                    <h5 class="main_text">Nhạc mới mỗi ngày</h5>
                </div>
                <div class="row row-cols-4 gx-5 mt-4">
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/nhactrongthang/nhacvietthang10.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Nhạc Việt mới trong tháng</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/nhactrongthang/nhacaumy.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Nhạc Âu Mỹ trong tháng</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/nhactrongthang/nhachan.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Nhạc Hàn Quốc trong tháng</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/nhactrongthang/nhachoa.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Nhạc Hoa trong tháng</a>
                    </div>
                </div>
                <div class="row container__section mt-30" style="margin-left: 200px;margin-top: 50px;width: 950px;height: 70px;">
                    <div class="col l-12 m-12 c-12">
                        <div class="row no-wrap label--container" style="margin-right: 0;margin-left: 0;">
                            <div class="col l-4 m-4 c-6 mb-30">
                                <div class="row__item item--label">
                                    <div class="row__item-container flex--top-left">
                                        <div class="row__item-display br-5">
                                           <div class="row__item-img img--label" style="background: url('./img/labels/label1.jpg') no-repeat center center / cover"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-4 m-4 c-6 mb-30">
                                <div class="row__item item--label">
                                    <div class="row__item-container flex--top-left">
                                        <div class="row__item-display br-5">
                                           <div class="row__item-img img--label" style="background: url('./img/labels/label2.jpg') no-repeat center center / cover"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col l-4 m-4 c-6 mb-30">
                                <div class="row__item item--label">
                                    <div class="row__item-container flex--top-left">
                                        <div class="row__item-display br-5">
                                            <div class="row__item-img img--label" style="background: url('./img/labels/label3.jpg') no-repeat center center / cover"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_content">
                    <h5 class="main_text" style="width: 300px;">Top 100</h5>
                </div>
                <div class="row row-cols-4 gx-5 mt-4">
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/top100/danceviet.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Top100 Nhạc Dance Việt Nam Hay Nhất</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/top100/nhactre.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Top100 bài hát nhạc trẻ hay nhất</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/top100/aumy.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Top100 nhạc Pop Âu Mỹ hay nhất</a>
                    </div>
                    <div class="main_article col ">
                        <div  class="main_article-img">
                            <img src="./img/top100/hanquoc.jpg" style="width:200px" alt="">
                            <div class="main_article-icon">
                               <span class="material-icons-outlined">favorite_border</span>
                               <span class=" material-icons-outlined">play_circle_outline</span>
                               <span class="material-icons-outlined">more_horiz</span>
                            </div>
                        </div>
                        <a  class="main_article-title" href="">Top100 nhạc Hàn Quốc hay nhất</a>
                    </div>
                </div>
            </div>
            <!-- Footer-->
            <footer class="container__footer container-fluid px-4 my-5">
                <div class="row gx-5">
                    <div class="col-12 container__footer-header">
                        <span>Đối Tác Âm Nhạc</span>
                    </div>
                    <div class="container__footer-brand">
                        <div class="row">
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand1.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div> 
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand2.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>     
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand3.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>   
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand4.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>   
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand5.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>  
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand6.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>   
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand7.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>      
                            <div class="col l-1-5 container__footer-brand-item">
                                <div class="footer__brand-container" style="background-color: white;">
                                    <img src="./assets/images/brands/brand7.png" alt="brand" class="container__footer-brand-img">
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                
            </footer>

        </div>   
        
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

