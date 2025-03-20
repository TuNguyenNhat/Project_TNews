<style>
    @media (min-width: 1200px){
        /* Phần nội dung chi tiết */
        h1, p, img, .tag{
            margin-left: 10px;
        }

        p{
            font-size: large;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .tag{
            display: flex;
            justify-content: space-between;
        }

        .contair_comment{
            padding: 5px;
            margin-top: 50px;
            overflow: scroll;
            width: 100%;
            height: 250px;
        }

        .profile{
            background-color: #ffffff;
            width: fit-content;
            border-radius: 7px;
            padding: 5px;
        }

        .profile>p{
            margin: 0;
        }

        .gmail{
            font-weight: bold;
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
<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT baitin.id, 
                        baitin.tieude, 
                        baitin.noidungtomtat, 
                        baitin.anh, 
                        baitin.noidungchitiet, 
                        baitin.ngaydang, 
                        theloai.tentheloai, 
                        danhmuc.tendanhmuc 
                FROM baitin 
                LEFT JOIN theloai ON baitin.theloai_id = theloai.id 
                LEFT JOIN danhmuc ON theloai.danhmuc_id = danhmuc.id
                WHERE baitin.id = '$id'";

        $res = mysqli_query($conn, $sql);

        if (!$res) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        }

        // Kiểm tra xem có bài tin với ID này không
        if (mysqli_num_rows($res) > 0) {
            // Lấy thông tin bài tin
            $row = mysqli_fetch_assoc($res);
        }

        // echo $row['tieude'];
    }
?>  

<div class="container d-flex flex-row mb-3">
        <!-- Nội dung bên phải -->
        <div class="col-md-15">
                <div class="tag">
                    <div class="tag_list">
                        <button type="button" class="btn btn-danger"><?php echo $row['tendanhmuc'];?></button>
                        <button type="button" class="btn btn-danger"><?php echo $row['tentheloai'];?></button>
                    </div>
                    <div class="date">
                        <p><?php echo date('l, d/m/Y', strtotime($row['ngaydang'])); ?></p>
                    </div>
                </div>
                <h1><?php echo $row['tieude'];?></h1>
                <p><?php echo $row['noidungtomtat'];?></p>
                <img src="data_img/<?php echo $row['anh'];?>" alt="" width="100%">
                <p><?php echo $row['noidungchitiet'];?></p>
                <div class="contair_comment">
                    <div class="comment">
                        <form class="row g-3">
                            <div class="col-11">
                                <input type="text" class="form-control" name="binhluan" id="inputPassword2" placeholder="Bình luận">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-danger mb-3" name="gui">Gửi</button>
                            </div>
                        </form>
                    </div>
                    <div class="list_comment">
                        <div class="profile">
                            <p class="gmail">123@gmail.com</p>
                            <p>text</p>
                        </div>
                    </div>
                </div>
        </div>

</div>