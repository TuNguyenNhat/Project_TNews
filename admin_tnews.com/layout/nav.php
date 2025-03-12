    <nav class="container navbar bg-body-tertiary">
        <div class="container-fluid">
            <img src="assets/image/LogoTNews.png" alt="" width="130px">
            <form class="d-flex" action="dangxuat.php" method="post">
                <?php
                    if(isset($_SESSION['dangnhapthanhcong'] ) && $_SESSION['dangnhapthanhcong']  === true)
                    { ?>
                        <h3 class="navbar-brand" style="margin-top: 5px;">
                            Xin chào, <span style="color: #004370;"><?php echo $_SESSION['tennguoidung']; ?></span>
                        </h3>
                    <?php }
                    else
                    {
                        header("Location: dangnhap.php");
                        exit();
                    }
                ?>
                <button name="dangxuat" type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
        </div>
    </nav>