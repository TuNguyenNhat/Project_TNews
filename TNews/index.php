<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNews</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="./image/LogoTNews.png" alt="" width="130px"></a>
            <!-- Reponsive navbar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- menu items -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Về chúng tôi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Liên hệ</a>
                    </li>
                </ul>

                <!-- đăng kí đăng nhập -->
                <div class="dangnhap_dangki">
                    <a href="" class="btn btn-danger btn-sm">Đăng kí</a>
                    <a href="" class="btn btn-danger btn-sm">Đăng nhập</a>
                </div>

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

    <!-- Phần nội dung -->
    <div class="container d-flex flex-row mb-3">
        <!-- Nội dung bên trái -->
        <div class="col-md-3">
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Thời sự</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Chính trị</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Giao thông</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Ngoài nước</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Kinh doanh</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Quốc tế</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Bất động sản</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Danh nghiệp</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Chứng khoán</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Công nghệ</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">A.I</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thiết bị</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Ứng dụng</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Thể thao</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Bóng đá</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Bóng rổ</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Pickleball</a>
            </div>
            <div class="list-group" style="margin-bottom: 10px;">
                <a href="#" class="list-group-item list-group-item-action active" 
                    style="background-color: #004370; border: none;" 
                    aria-current="true">Giải trí</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Giới sao</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Phim</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Trending</a>
                <a href="#" class="list-group-item list-group-item-action" style="color: #000000;">Thời trang</a>
            </div>
        </div>
        <!-- Nội dung bên phải -->
        <div class="col-md-9">
            <h3>Tin đặc biệt của hôm nay</h3>
            <!-- Phan tin noi bat -->
            <div class="hot_news">
                <!-- anh cua tin hot -->
                <div class="image">
                    <a href="">
                        <img src="./image/test.webp" style="border-radius: 15px;" alt="" width= "100%;">
                    </a>
                </div>
                <!-- tieu de + noi dng cua tin hot -->
                <div class="news_content">
                    <div class="tieude_tin">
                        <a href=""><h2>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h2></a>
                    </div>
                    <div class="mota_tin">
                        <a href="">
                            <p>Đang lao xuống con dốc trên quốc lộ 6, 
                                xe giường nằm va chạm với xe đầu kéo tạo âm thanh như bom nổ, 
                                thành trái bị xé toạc, hành khách văng ra ngoài.
                                Trong hơn 30 hành khách trên xe giường nằm</p>
                        </a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                    <div class="total_comment">
                        <a href="">Bình luận:</a>
                        <a href="">60</a>
                    </div>
                </div>
            </div>

            <h3>Các tin khác</h3>

            <!-- Danh sach tin tuc -->
            <div class="lits_news">
                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>

                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="./image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần footer -->
    <footer class="container">
        <div class="footer_top">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-facebook-messenger"></i></a>
            <a href=""><i class="fas fa-map-marker-alt"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-github"></i></a>
        </div>
        <div class="footer_bottom">
            <p>© 2025 Copyright By: Nguyễn Nhật Tú</p>
        </div>
    </footer>


    <!-- nhung js boostrap -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>