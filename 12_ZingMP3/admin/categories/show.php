<?php 
    require_once '../check_super_admin_signin.php';
    $page = 'categories';
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

    $id = $_GET['id'];
    $sql = "select *
    from songs
    where category_id = '$id'";
    $result = mysqli_query($connect, $sql);

    $sql = "select * from categories where id = '$id'";
    $categories = mysqli_query($connect, $sql);
    $category = mysqli_fetch_array($categories);
?>

        <div class="main__container">
            <div class="container-fluid px-4">
                <div class="row gx-5">
                   <div class="col-4">
                        <div class="category__img">
                            <img src="../../assets/images/categories/<?= $category['image'] ?>" alt="">
                        </div>
                        <h1 class="category__name">
                            <?= $category['name'] ?>
                        </h1>
                   </div>
                   <div class="col-8">
                       <?php require_once '../error_success.php' ?>
                       <?php foreach ($result as $each) { ?>
                            <div class="song__media">
                                <img class="song__media-img" src="../../assets/images/songs/<?= $each['image'] ?>" alt="">
                                <div class="song__media-content">
                                    <div class="song__media-name">
                                        <?= $each['name'] ?>
                                    </div>
                                    <div class="song__media-vocalist">
                                        <?= $each['vocalist'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                   </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>