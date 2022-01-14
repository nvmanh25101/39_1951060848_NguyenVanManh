<?php 
    session_start();


    require_once './database/connect.php';
    $sql = "select * from categories";
    $result = mysqli_query($connect, $sql);

    require_once './template/heading.php';
?>

            <!-- Content -->
            <div class="container-fluid px-4">
                <div class="main_content">
                    <h5 class="main_text">Lựa chọn hôm nay</h5>
                </div>
                <div class="row gx-5 mt-4">
                    <?php foreach ($result as $each) { ?>
                        <a class="main_article col-3">
                            <div  class="main_article-img">
                                <img src="./assets/images/categories/<?= $each['image'] ?>" style="width:200px" alt="">
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
                <div class="row gx-5 mt-4">
                    <div class="main_article col-3">
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
                    <div class="main_article col-3">
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
                    <div class="main_article col-3">
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
                    <div class="main_article col-3">
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
                <!-- <div class="row container__section mt-30" style="margin-left: 200px;margin-top: 50px;width: 950px;height: 70px;">
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
                </div> -->
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
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

