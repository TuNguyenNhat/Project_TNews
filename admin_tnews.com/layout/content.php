    <div class="col-md" style="margin-left: 10px; 
                                height: 655px; 
                                background-color:rgb(253, 253, 253); 
                                border: 1px solid #ebebeb;
                                padding-left: 70px;
                                padding-top: 70px;">
        <div class="phan1" style="display: flex; flex-wrap: wrap;">
            <div class="card text-bg-danger mb-3" style="max-width: 18rem; margin: 15px;">
                <div class="card-header">Tài khoản</div>
                <div class="card-body">
                    <?php 
                        $sql = "SELECT * 
                                FROM taikhoan";
                        $res = mysqli_query($conn, $sql);
                        $dem_taikhoan = mysqli_num_rows($res); 
                    ?>
                    <h5 class="card-title">Tổng số tài khoản đang có là: <span><?php echo $dem_taikhoan; ?></span></h5>
                </div>
            </div>

            <div class="card text-bg-danger mb-3" style="max-width: 18rem; margin: 15px;">
                <div class="card-header">Bài tin</div>
                <div class="card-body">
                    <?php 
                        $sql = "SELECT * 
                                FROM baitin";
                        $res = mysqli_query($conn, $sql);
                        $dem_baitin = mysqli_num_rows($res); 
                    ?>
                    <h5 class="card-title">Tổng số bài tin đang có là: <span><?php echo $dem_baitin; ?></span></h5>
                </div>
            </div>

            <div class="card text-bg-danger mb-3" style="max-width: 18rem; margin: 15px;">
                <div class="card-header">Danh mục</div>
                <div class="card-body">
                    <?php 
                        $sql = "SELECT * 
                                FROM baitin";
                        $res = mysqli_query($conn, $sql);
                        $dem_danhmuc = mysqli_num_rows($res); 
                    ?>
                    <h5 class="card-title">Tổng số danh mục đang có là: <span><?php echo $dem_danhmuc; ?></span></h5>
                </div>
            </div>

            <div class="card text-bg-danger mb-3" style="max-width: 18rem; margin: 15px;">
                <div class="card-header">Thể loại</div>
                <div class="card-body">
                    <?php 
                        $sql = "SELECT * 
                                FROM baitin";
                        $res = mysqli_query($conn, $sql);
                        $dem_theloai = mysqli_num_rows($res); 
                    ?>
                    <h5 class="card-title">Tổng số thể loại đang có là: <span><?php echo $dem_theloai; ?></span></h5>
                </div>
            </div>

            <div class="card text-bg-danger mb-3" style="max-width: 18rem; margin: 15px;">
                <div class="card-header">Bình luận</div>
                <div class="card-body">
                    <?php 
                        $sql = "SELECT * 
                                FROM baitin";
                        $res = mysqli_query($conn, $sql);
                        $dem_binhluan = mysqli_num_rows($res); 
                    ?>
                    <h5 class="card-title">Tổng số bình luận đang có là: <span><?php echo $dem_binhluan; ?></span></h5>
                </div>
            </div>
        </div>
    </div>