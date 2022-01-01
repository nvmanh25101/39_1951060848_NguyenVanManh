<?php 
    require_once '../check_super_admin_signin.php';
    $page = 'form_insert-category';
    require_once '../navbar-vertical.php';

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
                            <span id="error" class="error_input"></span>
                        </div>

                        <div class="mb-4 fs-4">
                            <label class="form-label" for="image">Ảnh</label>
                            <input type="file" name="image" id="image" accept="image/*" class="form__input form-control"/>
                        </div>

                        <button type="submit" class="form__btn btn btn-dark mb-4" onclick="return validate()">Thêm</button>
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