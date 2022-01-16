<?php 
    require_once '../check_admin_signin.php';
    $page = 'songs';
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

    $sql_num_song = "select count(*) from songs 
                    where name like '%$search%'";
    $arr_num_song = mysqli_query($connect, $sql_num_song);
    $result_num_song = mysqli_fetch_array($arr_num_song);
    $num_song = $result_num_song['count(*)'];

    $num_song_per_page = 5;

    $num_page = ceil($num_song / $num_song_per_page);
    $skip_page = $num_song_per_page * ($page - 1);

    $sql = "select songs.*, categories.name as category_name, admin.name as admin_name, songs.admin_id
    from songs
    join categories
    on categories.id = songs.category_id
    join admin
    on admin.id = songs.admin_id
    where songs.name like '%$search%'
    order by songs.id desc
    limit $num_song_per_page offset $skip_page
    ";
    $result = mysqli_query($connect, $sql);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <a href="form_insert.php" class="btn btn-dark btn-lg fs-3">Thêm</a>
                <div class="row gx-5">
                   <div class="col-12">
                    <table class="song__table table table-sm table-dark table-bordered table-hover align-middle">
                        <caption class="caption-top text-center mb-2">
                            <form action="">
                                <input type="search" name="search" class="form__search" value="<?= $search ?>" placeholder="Nhập để tìm kiếm">
                            </form>
                        </caption>

                        <?php require_once '../error_success.php' ?>
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
                                    <td>
                                        <a href="show.php?id=<?= $each['id'] ?>" class="text-decoration-none"><?= $each['name'] ?></a>
                                    </td>
                                    <td>
                                        <img class="songs__img" src="../../assets/images/songs/<?= $each['image'] ?>" alt="">
                                    </td>
                                    <td>
                                        <audio controls class="songs__audio">
                                            <source src="../../assets/audio/<?= $each['audio'] ?>" type="audio/mpeg">
                                        </audio>
                                    </td>
                                    <td><?= $each['vocalist'] ?></td>
                                    <td><?= $each['category_name'] ?></td>
                                    <td><?= $each['admin_name'] ?></td>
                                    <td>
                                        <a href="form_update.php?id=<?= $each['id'] ?>&admin_id=<?= $each['admin_id'] ?>">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?= $each['id'] ?>&admin_id=<?= $each['admin_id'] ?>">
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
        
<?php require_once '../footer.php'; ?>