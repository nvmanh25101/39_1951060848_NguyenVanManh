<?php
    require_once '../check_admin_signin.php';
    $page = "playlists";
    require_once '../navbar-vertical.php';

    require_once '../../connect.php';
    $sql = "select * from playlists";
    $result = mysqli_query($connect, $sql);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <a href="form_insert.php" class="btn-insert btn btn-dark btn-lg mb-3 fs-3">Thêm</a>   
                <?php include '../error_success.php' ?>
                
                <div class="row gx-5">
                    <div class="col-12">
                        <table class="playlist__table table table-sm table-dark table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                <th scope="col">Mã</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $each) { ?>
                                <tr>
                                    <th scope="row"><?= $each['id'] ?></th>
                                    <td>
                                        <a href="show.php?id=<?= $each['id'] ?>" class="text-decoration-none">
                                            <?= $each['name'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <img class="playlists__img" src="../../assets/images/playlists/<?= $each['image'] ?>" alt="Avatar">
                                    </td>
                                    <td>
                                        <a href="form_update.php?id=<?= $each['id'] ?>">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?= $each['id'] ?>">
                                        <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
<script src="../../assets/js/admin.js"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>