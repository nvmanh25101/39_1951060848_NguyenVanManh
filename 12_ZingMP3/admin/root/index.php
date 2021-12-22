<?php 
    include '../menu.php';
?>

        <header class="header d-flex justify-content-between align-items-center">
                <a class="header__name text-decoration-none" href="#">Dashboard</a>
                <div class="header__user d-flex align-items-center">
                    <img class="header__user-img" src="../../assets/user_img/user.jpg" alt="avt-user">
                    <span class="header__user-name">Mạnh Nguyễn</span>
                </div>
        </header>

        <div class="main__container">
            <div class="container-fluid px-4">
                <div class="row gx-5">
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG BÀI HÁT</h5> 
                                <span class="card__quantity">100</span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-vinyl-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG THỂ LOẠI</h5>
                                <span class="card__quantity">100</span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-slack"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG NHÂN VIÊN</h5>
                                <span class="card__quantity">100</span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG NGƯỜI DÙNG</h5>
                                <span class="card__quantity">100</span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>