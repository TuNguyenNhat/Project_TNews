<style>
    @media (min-width: 1200px){
        /* Phần nội dung tin hot */
        .col-md-9{
            margin-left: 10px;
        }

        .col-md-9>h3{
            text-align: center;
            margin-bottom: 20px;
        }

        .hot_news{
            display: flex;
            justify-content: space-between;
            background-color: rgb(255, 255, 255);
            padding: 15px;
            border-radius: 8px;
        }

        .news_content{
            margin-left: 10px;
        }

        .tieude_tin>a{
            text-decoration: none;
            color: black;
        }

        .mota_tin>a{
            text-decoration: none;
            color: gray;
        }

        .total_comment{
            margin-top: 15px;
        }

        .total_comment>a{
            text-decoration: none;
            color: black;
        }

        /* Phần danh sách tin tức */
        .lits_news{
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .items{
            background-color: white;
            padding: 15px;
            width: 305px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .tieude_list-news>a{
            text-decoration: none;
            color: black;
        }

        .tieude_list-news>a>h4{
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 300px;
            height: 90px;
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

            <div class="hot_news">
                <!-- anh cua tin hot -->
                <div class="image">
                    <a href="">
                        <img src="assets/image/test.webp" style="border-radius: 15px;" alt="" width= "100%;">
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

            <div class="lits_news">
                <div class="items">
                    <div class="tieude_list-news">
                        <a href=""><h4>Nạn nhân vụ tông xe: Tiếng va chạm như bom nổ</h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
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
                        <a href=""><img src="assets/image/test.webp" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Thời sự</a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" >Giao thông</a>
                    </div>
                </div>
            </div>