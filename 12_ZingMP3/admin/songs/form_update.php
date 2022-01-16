<?php 
    require_once '../check_admin_signin.php';
    $page = 'songs';
    
    if(empty($_GET['id'])) {
        $_SESSION['error'] = 'Phải chọn để sửa!';
        header('location:index.php');
        exit();
    }

    if($_GET['admin_id'] != $_SESSION['id'] || $_SESSION['level'] != 1) {
        $_SESSION['error'] = 'Bạn không có quyền để truy cập';
        header('location:index.php');
        exit();
    }
    
    $id = $_GET['id'];
    require_once '../../database/connect.php';
    
    $sql = "select * from songs where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    
    $sql = "select * from categories";
    $categories = mysqli_query($connect, $sql);
    
    require_once '../navbar-vertical.php';
?>
    <div class="main__form">
        <div class=" container-fluid px-4">
            <?php include '../error_success.php' ?>
          
            <div class="row gx-5">
                <div class="col-12 text-white">

                     <form action="process_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $each['id'] ?>">

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" name="name" value="<?= $each['name'] ?>" id="name" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label">Ảnh cũ</label>
                            <img src="../../assets/images/songs/<?= $each['image']?>" class="img-thumbnail" alt="">
                            <input type="hidden" name="image_old" value="<?= $each['image'] ?>" />
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label">Đổi ảnh mới</label>
                            <input type="file" name="image_new" accept="image/*" class="form__input form-control"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="audio">Nhạc cũ</label>
                            <input type="hidden" name="audio_old" value="<?= $each['audio'] ?>" id="audio" accept=".mp3" class="form__input form-control"/>
                            <audio controls class="song__audio-update">
                                <source src="../../assets/audio/<?= $each['audio'] ?>" type="audio/mpeg">
                            </audio>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="audio">Đổi nhạc mới</label>
                            <input type="file" name="audio_new" id="audio" accept=".mp3" class="form__input form-control"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label">Lời bài hát</label>
                            <textarea name="lyric" class="form__input form-control"><?= $each['lyric'] ?></textarea>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="vocalist">Ca sĩ</label>
                            <input type="text" name="vocalist" value="<?= $each['vocalist'] ?>" id="vocalist" class="form__input form-control"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label">Thể loại</label>
                            <select class="form__select form-select" name="category_id">
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category['id'] ?>"
                                        <?php if($each['category_id'] == $category['id']) { ?>
                                            selected
                                        <?php } ?>
                                    >
                                        <?php echo $category['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>

                        <input type="hidden" name="admin_id" value="<?= $_SESSION['id']?>">
                        </div>

                        <button type="submit" class="form__btn btn btn-dark mb-4">Sửa</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</div>
    
</body>
<script>
    // let image = document.getElementById('image').value;
    
    function validate() {
        let name = document.getElementById('name').value;

        let check_error = false;
        if(name.length === 0) {
            document.getElementById('error').innerHTML = 'Tên không được để trống';

            check_error = true;
        }

        if(check_error) {
            return false;
        }
    }
</script>
</html>