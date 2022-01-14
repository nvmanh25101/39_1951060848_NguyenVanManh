<?php 
    require_once '../check_admin_signin.php';

    $page = 'songs';
    require_once '../navbar-vertical.php';

    require_once '../../database/connect.php';

    $sql = "select * from categories";
    $result = mysqli_query($connect, $sql);
?>
    <div class="main__form">
        <div class=" container-fluid px-4">
            <?php include '../error_success.php' ?>
        
            <div class="row gx-5">
                <div class="col-12 text-white">

                    <form action="process_insert.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" name="name" id="name" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Ảnh</label>
                            <input type="file" name="image" id="image" accept=".jpg, .png" class="form__input form-control"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="audio">Nhạc</label>
                            <input type="file" name="audio" id="audio" accept=".mp3" class="form__input form-control"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label">Lời bài hát</label>
                            <textarea name="lyric" class="form__input form-control"></textarea>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="vocalist">Ca sĩ</label>
                            <input type="text" name="vocalist" id="vocalist" class="form__input form-control"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label">Thể loại</label>
                            <select class="form__select form-select" name="category_id">
                                <?php foreach ($result as $each) { ?>
                                    <option value="<?= $each['id'] ?>">
                                        <?= $each['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>

                        <input type="hidden" name="admin_id" value="<?= $_SESSION['id']?>">
                        </div>

                        <button type="submit" class="form__btn btn btn-dark mb-4">Thêm</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</div>
    
</body>

</html>