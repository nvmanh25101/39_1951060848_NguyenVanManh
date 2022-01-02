<?php 
    require_once '../check_super_admin_signin.php';
    $page = "employees";
    require_once '../navbar-vertical.php';

    require_once '../../connect.php';
    $sql = "select * from admin where level = '0'";
    $result = mysqli_query($connect, $sql);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <a href="form_insert.php" class="btn btn-dark btn-lg mb-3 fs-3">Thêm</a>
                <div class="row gx-5">
                    <div class="col-12">
                        <table class="employee__table table table-sm table-dark table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                <th scope="col">Mã</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Ảnh đại diện</th>
                                <th scope="col">Email</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Số điện thoại</th>
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
                                        <img class="employee__img" src="../../assets/images/admin/<?= $each['image'] ?>" alt="Avatar">
                                    </td>
                                    <td><?= $each['email'] ?></td>
                                    <td><?= $each['gender'] == 1?'Nam':'Nữ' ?></td>
                                    <td><?= $each['phone'] ?></td>
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