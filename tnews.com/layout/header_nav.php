<style>
    @media (min-width: 1200px){
        .login{
            margin-right: 10px;
            margin-top: 2px;
        }

        .ten{
            margin: 10px;
        }

        .btn{
            margin-right: 5px;
        }
    }

    @media (min-width: 992px) and (max-width: 1200px){

    }

    @media (min-width: 768px) and (max-width: 992px){

    }

    @media (min-width: 576px) and (max-width: 768px){

    }

    @media (max-width: 576px){

    }
</style>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/image/LogoTNews.png" alt="" width="130px"></a>
            <!-- Reponsive navbar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- menu items -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?layout=trangchu&action=page_trangchu">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Về chúng tôi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Liên hệ</a>
                    </li>
                </ul>

                <!-- đăng kí đăng nhập -->
                <?php 
                    if(isset($_SESSION['dangnhapthanhcong']) && $_SESSION['dangnhapthanhcong']  === true)
                    { ?>
                        <p class="ten">Xin chào, <span style="color: #004370; font-weight: bold;"><?php echo $_SESSION['tennguoidung']; ?></span></p>
                        <form action="dangxuat.php" method="post">
                            <button name="dangxuat" type="submit" class="btn btn-danger">Đăng xuất</button>
                        </form>
                   <?php } 
                    else
                    { ?>
                        <div class="dangnhap_dangki">
                            <a href="dangnhap.php" class="btn btn-danger btn-sm">Đăng nhập</a>
                        </div>
                   <?php } ?>

                <!-- form tìm kiếm -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2 btn-sm" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success btn-sm" type="submit">
                        Tìm
                    </button>
                </form>
            </div>
        </div>
    </nav>