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
            padding-right: 50px;
        }

        .profile>p{
            margin: 0;
        }

        .gmail{
            font-weight: bold;
        }

        .dangnhap_comment{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
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
                    <?php 
                        if(isset($_SESSION['dangnhapthanhcong']) && $_SESSION['dangnhapthanhcong']  === true)
                        { ?>
                        <div class="comment">
                            <form class="row g-3" method="post">
                                <div class="col-11">
                                    <input type="text" class="form-control" name="binhluan" id="inputPassword2" placeholder="Bình luận" required>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-danger mb-3" name="gui">Gửi</button>
                                </div>
                            </form>
                        </div>
                        <?php 
                            if(isset($_POST['gui']))
                            {
                                //lấy nội dung bình luận từ input
                                $nd_bl = $_POST['binhluan'];

                                //lấy tên bình luận
                                $tenbinhluan = $_SESSION['tennguoidung'];

                                $layid_tk = "SELECT id FROM taikhoan WHERE tennguoidung = '$tenbinhluan'";
                                $result = mysqli_query($conn, $layid_tk);
                                if(mysqli_num_rows($result) > 0)
                                {
                                    $dong = mysqli_fetch_assoc($result);
                                    //lấy id tài khoản bình luận
                                    $taikhoan_id = $dong['id'];
                                }
                                // debug:
                                // echo $taikhoan_id;

                                //lấy id bài tin
                                $baitin_id = $_GET['id'];
                                // debug:
                                // echo $baidang_id;

                                $sql_bl = "INSERT INTO binhluan (noidung_bl, ngay_bl, baitin_id, taikhoan_id)
                                            VALUE ('$nd_bl', NOW(), '$baitin_id', '$taikhoan_id')";
                                mysqli_query($conn, $sql_bl);                
                            }
                        ?>
                        <?php }
                                else
                                { ?>
                                <div class="dangnhap_comment">
                                    <p style="color: red;">Bạn cần đăng nhập mới bính luận được!!</p>
                                    <div class="dangnhap_dangki">
                                        <a href="dangnhap.php" class="btn btn-danger btn-sm">Đăng nhập</a>
                                    </div>
                                </div>
                    <?php } ?>

                    <?php 
                        $hienthi_bl = "SELECT binhluan.ngay_bl, 
                                                taikhoan.tennguoidung, 
                                                binhluan.noidung_bl
                                        FROM binhluan
                                        JOIN taikhoan on binhluan.taikhoan_id = taikhoan.id
                                        WHERE binhluan.baitin_id = '$id'
                                        ORDER BY binhluan.id DESC";
                        $res_bl = mysqli_query($conn, $hienthi_bl);
                        while($arr = mysqli_fetch_assoc($res_bl))
                        { ?>
                            <div class="list_comment" style="margin-bottom: 10px;">
                                <div class="profile">
                                    <p style="font-size: 12px; font-style: italic;"><?php echo $arr['ngay_bl']; ?></p>
                                    <p class="gmail"><?php echo $arr['tennguoidung']; ?></p>
                                    <p style="font-size: 15px;"><?php echo $arr['noidung_bl']; ?></p>
                                </div>
                            </div>
                       <?php }
                    ?>
                </div>
        </div>

</div>