<?php
    include('includes/session.php');
    require_once('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNews</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleFromdangnhap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <?php
        if(isset($_SESSION['dangnhapthanhcong']) && $_SESSION['dangnhapthanhcong'] === true)
        {
            header("Location: index.php");
            exit();
        }
        else
        {
    ?>
    <div class="contair">
        <img src="assets/image/LogoTNews.png" alt="">
        <h3>Đăng nhập</h3>
        <?php 
            if(isset($_SESSION['dangnhapkhongthanhkhong']))
            {
                echo '<div class="alert alert-danger" role="alert">'.$_SESSION['dangnhapkhongthanhkhong'].'</div>';
                unset($_SESSION['dangnhapkhongthanhkhong']);
            }
        ?>
        <div>
            <form method="post" action="dangnhap.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                    <input name="nhap_tendn" type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input name="nhap_matkhau" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <button name="dangnhap" type="submit" class="btn btn-danger">Đăng nhập</button>
                <a href="dangki.php">Chưa có tài khoản?</a>
            </form>
        </div>
    </div>

    <?php 

        include('includes/connect.php');
        if(isset($_POST['dangnhap']))
        {
            $dn = $_POST['nhap_tendn'];
            $mk = $_POST['nhap_matkhau'];

            $sql = "SELECT * 
                    FROM taikhoan 
                    WHERE tendangnhap = '$dn' AND matkhau = '$mk'";

            $res = mysqli_query($conn, $sql);

            if($res)
            {
                $check_Trangthai = mysqli_fetch_assoc($res);
                if($check_Trangthai['trangthai'] === '0')
                {
                    $_SESSION['gmailI'] = $check_Trangthai['gmail'];
                    header('Location: xacnhan.php');
                    exit();
                }

                if($check_Trangthai['trangthai'] === '1')
                {
                    if($check_Trangthai['tendangnhap'] == $dn && $check_Trangthai['matkhau'] == $mk)
                    {
                        $_SESSION['gmailI'] = $check_Trangthai['gmail'];
                        $_SESSION['dangnhapthanhcong'] = true;
                        $_SESSION['tennguoidung'] = $check_Trangthai["tennguoidung"];
                        header('Location: index.php');
                        exit();
                    }
                    else
                    {
                        $_SESSION['dangnhapkhongthanhcong'] = 'Tên đăng nhập hoặc mật khẩu không đúng!';
                        header('Location: dangnhap.php');
                        exit();
                    }
                }
            }
        }

    ?>

    <?php } ?>

    <?php
        // if(isset($_POST['dangnhap']))
        // {
        //     $nhapttk = $_POST['nhaptentaikhoan'];
        //     $nhapmk = $_POST['nhapmatkhau'];

        //     $sql = "SELECT * 
        //             FROM taikhoan
        //             WHERE tendangnhap = '$nhapttk' AND matkhau = '$nhapmk'";

        //     $res = mysqli_query($conn, $sql);
        //     $arr = mysqli_fetch_assoc($res);
        //     if($arr)
        //     {
        //         if($arr["tendangnhap"] === 'admin')
        //         {
        //             $_SESSION['dangnhapthanhcong'] = true;
        //             $_SESSION['tennguoidung'] = $arr["tennguoidung"];
        //             header("Location: index.php");
        //             exit();
        //         }
        //         else
        //         {
        //             $_SESSION['dangnhapkhongthanhkhong'] = "Chỉ tài khoản Admin mới được phép đăng nhập";
        //             header("Refresh: 0; url=dangnhap.php");
        //             exit();
        //         }
        //     }
        //     else
        //     {
        //         $_SESSION['dangnhapkhongthanhkhong'] = "Tài khoản hoặc mật khẩu không chính xác";
        //         header("Refresh: 0; url=dangnhap.php");
        //         exit();
        //     }
        // }
    ?>

    <!-- nhung js boostrap -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>