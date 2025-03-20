<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNews</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleFromxacnhan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <style>
        input[type="mail"], input[type="text"], input[type="number"] {
            width: 300px; /* Độ rộng của ô input */
            padding: 8px; /* Tăng kích thước lề trong */
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>

<div class="contair">
        <img src="assets/image/LogoTNews.png" alt="">
        <h3>Xác nhận</h3>
        <div>
            <form method="post" action="xacnhan.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhập OTP</label>
                    <input name="nhap_otp" type="number" class="form-control" id="exampleInputEmail1" required>
                </div>
                <button name="xacnhan" type="submit" class="btn btn-danger">Xác thực</button>
            </form>
        </div>
    </div>

    <?php 
        include('includes/connect.php');

        if(isset($_POST['xacnhan']))
        {
            $otp = $_SESSION['otpI'];
            $gmail = $_SESSION['gmailI'];
            $otp_Input = $_POST['nhap_otp'];

            if($otp != $otp_Input)
            { ?>
                <script>
                    alert("Nhap Sai Ma OTP");
                </script>
            <?php }
            else
            {
                $sql = "UPDATE taikhoan 
                        SET trangthai = 1
                        WHERE gmail = '$gmail'";
                mysqli_query($conn, $sql); ?>
                <script>
                    alert("Xac Minh Tai Khoan Thanh Cong");
                    window.location.replace("dangnhap.php");
                </script>
            <?php }
        }

    ?>

    <!-- nhung js boostrap -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

