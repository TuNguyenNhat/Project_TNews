<?php
    include('includes/session.php');
    require_once('includes/connect.php');
    require ('send_Mail.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNews</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleFromdangki.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <?php
        // if(isset($_SESSION['dangnhapthanhcong']) && $_SESSION['dangnhapthanhcong'] === true)
        // {
        //     header("Location: index.php");
        //     exit();
        // }
        // else
        // {
    ?>
    <div class="contair">
        <img src="assets/image/LogoTNews.png" alt="">
        <h3>Đăng kí</h3>
        <div>
            <form method="post" action="dangki.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
                    <input name="nhaptennguoidung" type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                    <input name="nhaptendangnhap" type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input name="nhapmatkhau" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gmail</label>
                    <input name="nhapgmail" type="mail" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sđt</label>
                    <input name="sdt" type="number" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                    <input name="nhapdiachi" type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <button name="dangki" type="submit" class="btn btn-danger">Đăng kí</button>
            </form>
        </div>
    </div>

    <?php 
    
    if(isset($_POST["dangki"]))
    {
        $tennguoidung = $_POST['nhaptennguoidung'];
        $tendangnhap = $_POST['nhaptendangnhap'];
        $matkhau = $_POST['nhapmatkhau'];
        $gmail = $_POST['nhapgmail'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['nhapdiachi'];
    
        //kiem tra mail co ton tai khong
        $checkMail = mysqli_query($conn, "SELECT * FROM taikhoan WHERE gmail = '$gmail'");
        $check = mysqli_fetch_assoc($checkMail);
        if($check > 0)
        {
            echo "Gmail da ton tai";
        }
        else
        {
            $res = mysqli_query($conn, "INSERT INTO taikhoan (tennguoidung, 
                                                            tendangnhap, 
                                                            matkhau, 
                                                            gmail, 
                                                            sdt, 
                                                            diachi) 
                                        VALUES ('$tennguoidung', 
                                                '$tendangnhap',
                                                '$matkhau', 
                                                '$gmail', 
                                                '$sdt', 
                                                '$diachi')");
            if($res)
            {
                $otpI = rand(111111, 999999);
                $_SESSION['otpI'] = $otpI;
                $_SESSION['gmailI'] = $gmail;
                sendMail($gmail, $tendangnhap, $otpI);
            }
        }
    }
    
    ?>

    <?php 

        // include('includes/connect.php');
        // if(isset($_POST['dangnhap']))
        // {
        //     $dn = $_POST['nhap_ten'];
        //     $mk = $_POST['nhap_mk'];

        //     $sql = "SELECT * 
        //             FROM users 
        //             WHERE tendangnhap = '$dn' AND matkhau = '$mk'";

        //     $res = mysqli_query($conn, $sql);
        //     $check_Trangthai = mysqli_fetch_assoc($res);

        //     if($check_Trangthai['trangthai'] == 0)
        //     {
        //         $_SESSION['gmailI'] = $check_Trangthai['gmail'];
        //         header('Location: verify.php');
        //         exit();
        //     }
        //     else
        //     {
        //         $_SESSION['gmailI'] = $check_Trangthai['gmail'];
        //         header('Location: trangchu.php');
        //         exit();
        //     }
        // }

    ?>

    <?php //} ?>

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