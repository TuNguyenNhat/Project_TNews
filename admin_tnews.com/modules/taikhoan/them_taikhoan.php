<div class="col-md" style="margin-left: 10px; 
                            height: 655px; 
                            background-color:rgb(253, 253, 253); 
                            border: 1px solid #ebebeb;
                            padding: 10px;">
    <p style="text-align: center;
            color: #004370;
            font-weight: bold;">
            Thêm mới tài khoản
    </p>

    <form class="row g-3" action="index.php?modules=taikhoan&action=them_taikhoan" method="post"  style="margin-bottom: 20px; padding: 10px;">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control" id="inputEmail4" name="them_tennguoidung" required>
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" id="inputPassword4" name="them_tendangnhap" required>
        </div>

        <div class="col-6">
            <label for="inputAddress" class="form-label">Mật khẩu</label>
            <input type="text" class="form-control" id="inputAddress" name="them_matkhau" required>
        </div>

        <div class="col-6">
            <label for="inputAddress2" class="form-label">Gmail</label>
            <input type="gmail" class="form-control" id="inputAddress2" name="them_gmail" required>
        </div>

        <div class="col-md-3">
            <label for="inputCity" class="form-label">SĐT</label>
            <input type="number" class="form-control" id="inputCity" name="them_sdt" required>
        </div>

        <div class="col-md-8">
            <label for="inputCity" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="inputCity" name="them_diachi" required>
        </div>

        <!-- <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div> -->

        <div class="col-md-1">
            <label for="inputZip" class="form-label">Trạng thái</label>
            <input type="number" class="form-control" id="inputZip" name="them_trangthai" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-danger" name="themmoi">Thêm mới</button>
        </div>
    </form> 
    <?php 
        if(isset($_POST['themmoi']))
        {
            $them_tnd = $_POST['them_tennguoidung'];
            $them_tdn = $_POST['them_tendangnhap'];
            $them_mk = $_POST['them_matkhau'];
            $them_gm = $_POST['them_gmail'];
            $them_sdt = $_POST['them_sdt'];
            $them_dc = $_POST['them_diachi'];
            $them_tt = $_POST['them_trangthai'];

            $sql = "INSERT INTO taikhoan (tennguoidung, 
                                            tendangnhap, 
                                            matkhau,
                                            gmail,
                                            sdt,
                                            diachi,
                                            trangthai)
                    VALUES ('$them_tnd',
                            '$them_tdn',
                            '$them_mk',
                            '$them_gm',
                            '$them_sdt',
                            '$them_dc',
                            '$them_tt')";
            if(mysqli_query($conn, $sql))
            {
                $_SESSION['them_taikhoanthanhcong'] = "Thêm mới tài khoản thành công";
                echo '<div class="alert alert-success" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;
                                                                    margin-top: 210px;">'.$_SESSION['them_taikhoanthanhcong'].'</div>';
                unset($_SESSION['them_taikhoanthanhcong']);
                
            }
            else
            {
                $_SESSION['them_taikhoankhongthanhcong'] = "Thêm mới tài khoản không thành công";
                echo '<div class="alert alert-danger" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;
                                                                    margin-top: 210px;">'.$_SESSION['them_taikhoankhongthanhcong'].'</div>';
                unset($_SESSION['them_taikhoankhongthanhcong']);
                
            }
        }
    ?>
</div>