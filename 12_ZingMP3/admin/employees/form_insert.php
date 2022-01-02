<?php 
    require_once '../check_super_admin_signin.php';
    $page = 'employees';
    require_once '../navbar-vertical.php';
?>
    <div class="main__form">
        <div class=" container-fluid px-4">
            <div class="row gx-5">
                <div class="col-12 text-white">
                    <?php require_once '../error_success.php' ?>

                    <form action="process_insert.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4 fs-4">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" id="name" name="name" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form__input form-control" autocomplete="off"/>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form__input form-control" autocomplete="off" />
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Ảnh</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form__input form-control"/>
                        </div>
                        
                        <div class="mb-4 fs-4">
                            <label class="form-label me-3" for="gender">Giới tính</label>
                            <input type="radio" id="gender" class="form__input" name="gender" value="1"/>Nam
                            <input type="radio" id="gender" class="form__input ms-3" name="gender" value="0"/>Nữ
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="phone">Số điện thoại</label>
                            <input type="text" id="phone" name="phone" class="form__input form-control" autocomplete="off" />
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="level">Cấp độ</label>
                            <input type="text" id="level" value="Nhân viên" class="form__input form-control" autocomplete="off" disabled/>
                            <input type="hidden" name="level" value="0"/>
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