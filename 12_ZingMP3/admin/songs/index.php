<?php 
    require_once '../check_admin_signin.php';
    $page = 'songs';
    require_once '../navbar-vertical.php';

    require_once '../../connect.php';
    $sql = "select songs.*, categories.name as category_name, admin.name as admin_name 
    from songs
    join categories
    on categories.id = songs.category_id
    join admin
    on admin.id = songs.admin_id";
    $result = mysqli_query($connect, $sql);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
            <a href="form_insert.php" class="btn btn-dark btn-lg mb-3 fs-3">Thêm</a>
                <div class="row gx-5">
                   <div class="col-12">
                    <table class="song__table table table-sm table-dark table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                            <th scope="col">Mã</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Nhạc</th>
                            <th scope="col">Ca sĩ</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Người thêm</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $each) { ?>
                                <tr>
                                    <th scope="row"><?= $each['id'] ?></th>
                                    <td><?= $each['name'] ?></td>
                                    <td>
                                        <img class="song__img" src="../../assets/images/songs/<?= $each['image'] ?>" alt="">
                                    </td>
                                    <td>
                                        <audio controls class="song__audio">
                                            <source src="../../assets/audio/<?= $each['audio'] ?>" type="audio/mpeg">
                                        </audio>
                                    </td>
                                    <td><?= $each['vocalist'] ?></td>
                                    <td><?= $each['category_name'] ?></td>
                                    <td><?= $each['admin_name'] ?></td>
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
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>