<?php
    include('includes/session.php');
    include('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNews</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styleIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- phần nav -->
    <?php include('layout/header_nav.php'); ?>

    <!--Phần nội dung-->
    <div class="container d-flex flex-row mb-3">
        <!--Phần nội dung bên trái-->
        <div class="col-md-3">
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="index.php?layout=thoisu&action=page_thoisu" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Thời sự</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Chính trị</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Giao thông</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Ngoài nước</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="index.php?layout=kinhdoanh&action=page_kinhdoanh" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Kinh doanh</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Quốc tế</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Bất động sản</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Danh nghiệp</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Chứng khoán</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="index.php?layout=congnghe&action=page_congnghe" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Công nghệ</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">A.I</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thiết bị</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Ứng dụng</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="index.php?layout=thethao&action=page_thethao" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Thể thao</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Bóng đá</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Bóng rổ</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Pickleball</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="index.php?layout=giaitri&action=page_giaitri" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Giải trí</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Giới sao</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Phim</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Trending</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thời trang</a>
            </div>
        </div>

        <!--Phần nội dung bên phải-->
        <div class="col-md-9">
        <?php 
            //lấy đường dẫn là cha cùng họ hàng với index 
            if(isset($_GET['layout']))
            {
                $layoutVa = $_GET['layout'];
            }
            else
            {
                $layoutVa = '';
            }
            //lấy đường dẫn là con của cha tức là gọi index là chú
            if(isset($_GET['action']))
            {
                $actionVa = $_GET['action'];
            }
            else
            {
                $moduleVa = '';
            }
            // Điều hướng
            switch($layoutVa)
            {
                case 'trangchu':
                    switch($actionVa)
                    {
                        case 'page_trangchu':
                        include('layout/trangchu/page_trangchu.php');
                            break;
                    }
                    break;
                case 'thoisu':
                    switch($actionVa)
                    {
                        case 'page_thoisu':
                        include('layout/thoisu/page_thosu.php');
                            break;
                    }
                    break;
                case 'kinhdoanh':
                    switch($actionVa)
                    {
                        case 'page_kinhdoanh':
                        include('layout/kinhdoanh/page_kinhdoanh.php');
                            break;
                    }
                    break;
                case 'congnghe':
                    switch($actionVa)
                    {
                        case 'page_congnghe':
                        include('layout/congnghe/page_congnghe.php');
                            break;
                    }
                    break;
                case 'thethao':
                    switch($actionVa)
                    {
                        case 'page_thethao':
                        include('layout/thethao/page_thethao.php');
                            break;
                    }
                    break;
                case 'giaitri':
                    switch($actionVa)
                    {
                        case 'page_giaitri':
                        include('layout/giaitri/page_giaitri.php');
                            break;
                    }
                    break;
                case 'chitiet':
                    switch($actionVa)
                    {
                        case 'chitiet_baitin':
                        include('layout/chitiet/chitiet_baitin.php');
                            break;
                    }
                    break;
                case 'timkiem':
                    switch($actionVa)
                    {
                        case 'page_timkiem':
                        include('layout/timkiem/page_timkiem.php');
                            break;
                    }
                    break;
                case '':
                    include('layout/trangchu/page_trangchu.php');
                    break;
                default:
                    echo "Modules không tồn tại..";
            }
        
        ?>
        </div>
    </div>

    <!-- phần footer -->
    <?php include('layout/footer.php'); ?>

    <!-- nhung js boostrap -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>