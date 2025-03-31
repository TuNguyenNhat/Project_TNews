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
            <div class="lits_news">
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
                            WHERE danhmuc.tendanhmuc = 'Kinh Doanh'
                            ORDER BY baitin.id";
                    $res = mysqli_query($conn, $sql);
                    while($arr = mysqli_fetch_assoc($res))
                    { ?>
    
                <div class="items">
                    <div class="tieude_list-news">
                        <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr['id']; ?>"><h4><?php echo $arr['tieude']; ?></h4></a>
                    </div>
                    <div class="anh_list-news">
                        <a href="index.php?layout=chitiet&action=chitiet_baitin&id=<?php echo $arr['id']; ?>"><img src="data_img/<?php echo $arr['anh']; ?>" style="border-radius: 15px; margin-bottom: 10px;" alt="" width= "100%;"></a>
                    </div>
                    <div class="theloai_danhmuc">
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" ><?php echo $arr['tendanhmuc']; ?></a>
                        <a class="btn btn-primary" href="#" role="button" style="background-color: #004370; border: none;" ><?php echo $arr['tentheloai']; ?></a>
                    </div>
                </div>

                <?php } ?>
            </div>