<?php 
    require_once '../check_admin_signin.php';
    $page = "root";
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

    $sql = "select count(*) from admin where level = '0'";
    $admin = mysqli_query($connect, $sql);
    $admin_quantity = mysqli_fetch_array($admin)['count(*)'];
    $sql = "select count(*) from users";
    $user = mysqli_query($connect, $sql);
    $user_quantity = mysqli_fetch_array($user)['count(*)'];
    $sql = "select count(*) from categories";
    $category = mysqli_query($connect, $sql);
    $category_quantity = mysqli_fetch_array($category)['count(*)'];
    $sql = "select count(*) from songs";
    $song = mysqli_query($connect, $sql);
    $song_quantity = mysqli_fetch_array($song)['count(*)'];
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                
                <?php require_once '../error_success.php' ?>

                <div class="row gx-5">
                    <div class="col-md-3">
                        <div class="card d-flex flex-row">
                            <div class="card__content d-flex flex-column justify-content-between">
                                <h5 class="card__name">SỐ LƯỢNG BÀI HÁT</h5> 
                                <span class="card__quantity"><?= $song_quantity ?></span>
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
                                <span class="card__quantity"><?= $category_quantity ?></span>
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
                                <span class="card__quantity"><?= $admin_quantity ?></span>
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
                                <span class="card__quantity"><?= $user_quantity ?></span>
                            </div>
                            <div class="card__icon d-flex flex-fill">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../assets/js/jquery-3.6.0.min.js"></script>
</body>
</html>