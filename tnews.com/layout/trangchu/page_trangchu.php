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

            <h3>Tin nóng</h3>
            <?php
                    $sql = "SELECT baitin.id, 
                                    baitin.tieude, 
                                    baitin.noidungtomtat, 
                                    baitin.anh, 
                                    theloai.tentheloai, 
                                    danhmuc.tendanhmuc 
                            FROM baitin 
                            LEFT JOIN theloai ON baitin.theloai_id = theloai.id 
                            LEFT JOIN danhmuc ON theloai.danhmuc_id = danhmuc.id 
                            ORDER BY baitin.id DESC LIMIT 1;";
                    $res = mysqli_query($conn, $sql);
                    while($arr = mysqli_fetch_assoc($res))
                    { ?>
            <!-- Phan tin noi bat -->
            <div class="hot_news">
                <!-- anh cua tin hot -->
                <div class="image">
                    <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr['id']; ?>">
                        <img src="data_img/<?php echo $arr['anh']; ?>" style="border-radius: 15px;" alt="" width= "400px;">
                    </a>
                </div>
                <!-- tieu de + noi dng cua tin hot -->
                <div class="news_content">
                    <div class="tieude_tin">
                        <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr['id']; ?>"><h2><?php echo $arr['tieude']; ?></h2></a>
                    </div>
                    <div class="mota_tin">
                        <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr['id']; ?>">
                            <p><?php echo $arr['noidungtomtat']; ?></p>
                        </a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" ><?php echo $arr['tendanhmuc']; ?></a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" ><?php echo $arr['tentheloai']; ?></a>
                    </div>
                    <div class="total_comment">
                        <a href="">Bình luận:</a>
                        <a href="">60</a>
                    </div>
                </div>
            </div>
            <?php } ?>

            <h3>Các tin khác</h3>

            <!-- Danh sach tin tuc -->
            <div class="lits_news">
                <?php 
                    $sql_bantin = "SELECT baitin.id, 
                                    baitin.tieude, 
                                    baitin.anh,
                                    theloai.tentheloai, 
                                    danhmuc.tendanhmuc 
                            FROM baitin 
                            LEFT JOIN theloai ON baitin.theloai_id = theloai.id 
                            LEFT JOIN danhmuc ON theloai.danhmuc_id = danhmuc.id";
                    $res_bantin = mysqli_query($conn, $sql_bantin);
                    while($arr_bantin = mysqli_fetch_assoc($res_bantin))
                    { ?>
                    <div class="items">
                        <div class="tieude_list-news">
                            <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr_bantin['id']; ?>"><h4><?php echo $arr_bantin['tieude']; ?></h4></a>
                        </div>
                        <div class="anh_list-news">
                            <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr_bantin['id']; ?>"><img src="data_img/<?php echo $arr_bantin['anh']; ?>" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                        </div>
                        <div class="theloai_danhmuc">
                            <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" ><?php echo $arr_bantin['tendanhmuc']; ?></a>
                            <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" ><?php echo $arr_bantin['tentheloai']; ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>