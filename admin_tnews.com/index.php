<?php
    include('includes/session.php');
    include('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý Website TNews</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- phần nav -->
    <?php include('layout/nav.php') ?>

    <!-- Phần conntent -->
    <div class="container d-flex flex-row mb-3">
        <!-- quản lý bên trái -->
        <div class="col-md-1.5">
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="index.php" class="list-group-item list-group-item-action active" 
                style="background-color: #004370; border: none;" 
                aria-current="true">Trang quản lý</a>
            </div>

            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                style="background-color: #004370; border: none;" 
                aria-current="true">Quản lý tài khoản</a>
                <a href="index.php?modules=taikhoan&action=them_taikhoan" class="list-group-item list-group-item-action" style="color: #000000;">Thêm tài khoản</a>
                <a href="index.php?modules=taikhoan&action=ds_taikhoan" class="list-group-item list-group-item-action" style="color: #000000;">Danh sách tài khoản</a>
            </div>

            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                style="background-color: #004370; border: none;" 
                aria-current="true">Quản lý bài tin</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thêm bài tin</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Danh sách bài tin</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                style="background-color: #004370; border: none;" 
                aria-current="true">Quản lý danh mục</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thêm danh mục</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Danh sách danh mục</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                style="background-color: #004370; border: none;" 
                aria-current="true">Quản lý thể loại</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thêm thể loại</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Danh sách thể loại</a>
            </div>

            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                style="background-color: #004370; border: none;" 
                aria-current="true">Quản lý bình luận</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Danh sách bình luận</a>
            </div>
        </div>

        <?php 
            if(isset($_GET['modules']))
            {
                $moduleVa = $_GET['modules'];
            }
            else
            {
                $moduleVa = '';
            }

            if(isset($_GET['action']))
            {
                $actionVa = $_GET['action'];
            }
            else
            {
                $moduleVa = '';
            }

            switch($moduleVa)
            {
                case 'taikhoan':
                    switch($actionVa)
                    {
                        case 'ds_taikhoan':
                            include('modules/taikhoan/ds_taikhoan.php');
                            break;
                        case 'them_taikhoan':
                            include('modules/taikhoan/them_taikhoan.php');
                            break;
                    }
                    break;
                case '':
                    include('layout/content.php');
                    break;
                default:
                    echo "Modules không tồn tại..";
            }
        ?>
    </div>


    <!-- nhung js boostrap -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>