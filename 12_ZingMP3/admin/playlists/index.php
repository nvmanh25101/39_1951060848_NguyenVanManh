<?php
    require_once '../check_admin_signin.php';
    $page = "playlists";
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

    $page = 1;
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $search = '';
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    $sql_num_playlist = "select count(*) from playlists
                    where name like '%$search%'";
    $arr_num_playlist = mysqli_query($connect, $sql_num_playlist);
    $result_num_playlist = mysqli_fetch_array($arr_num_playlist);
    $num_playlist = $result_num_playlist['count(*)'];

    $num_playlist_per_page = 10;

    $num_page = ceil($num_playlist / $num_playlist_per_page);
    $skip_page = $num_playlist_per_page * ($page - 1);

    $sql = "select * from playlists
    where name like '%$search%'
    order by id desc
    limit $num_playlist_per_page offset $skip_page
    ";
    $result = mysqli_query($connect, $sql);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <a href="form_insert.php" class="btn-insert btn btn-dark btn-lg fs-3">Thêm</a>   
                <?php include '../error_success.php' ?>
                
                <div class="row gx-5">
                    <div class="col-12">
                        <table class="playlist__table table table-sm table-dark table-bordered table-hover align-middle">
                            <caption class="caption-top text-center mb-2">
                                <form action="">
                                    <input type="search" name="search" class="form__search" value="<?php echo $search ?>" placeholder="Nhập để tìm kiếm">
                                </form>
                            </caption>
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

<?php require_once '../footer.php'; ?>