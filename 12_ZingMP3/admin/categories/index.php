<?php 
    include '../menu.php';
?>

        <header class="header d-flex justify-content-between align-items-center">
                <a class="header__name text-decoration-none" href="#">Thể loại</a>
                <div class="header__user d-flex align-items-center">
                    <img class="header__user-img" src="../../assets/user_img/user.jpg" alt="avt-user">
                    <span class="header__user-name">Mạnh Nguyễn</span>
                </div>
        </header>

        <div class="main__container">
            <div class="container-fluid px-4">
                <div class="row gx-5">
                    <div class="col-12">
                        <table class="category__table table table-sm table-dark table-bordered table-hover align-middle">
                            <thead>
                                <tr>
                                <th scope="col">Mã</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    
                                    <td>
                                        <i class="bi bi-pencil-fill"></i>
                                    </td>
                                    <td>
                                        <i class="bi bi-trash-fill"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>
                                        <i class="bi bi-pencil-fill"></i>
                                    </td>
                                    <td>
                                        <i class="bi bi-trash-fill"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry the Bird</td>
                                    <td>
                                        <i class="bi bi-pencil-fill"></i>
                                    </td>
                                    <td>
                                        <i class="bi bi-trash-fill"></i>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>