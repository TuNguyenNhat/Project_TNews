<style>
    .ck-editor__editable {
        min-height: 300px; 
        overflow: auto;
    }
    label{
        font-weight: bold;
    }
</style>

<div class="col-md" style="margin-left: 10px; 
                            height: 850px; 
                            background-color:rgb(253, 253, 253); 
                            border: 1px solid #ebebeb;
                            padding: 10px;">
    <p style="text-align: center;
            color: #004370;
            font-weight: bold;">
            Thêm mới bài tin
    </p>

    <form class="row g-3" 
            action="index.php?modules=baitin&action=them_baitin" 
            method="post"  
            enctype="multipart/form-data"
            style="margin-bottom: 20px; padding: 10px;">
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="inputEmail4" name="them_tieude" required>
        </div>

        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Nội dung tóm tắt</label>
            <textarea class="form-control" id="floatingTextarea" name="them_ndtt" required></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Ảnh</label>
            <input type="file" class="form-control" id="anh" name="them_anh" required>
        </div>

        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Nội dung chi tiết</label>
            <textarea class="form-control" id="them_ndct" name="them_ndct" rows="12" required></textarea>
        </div>

        <div class="col-md-5">
            <label for="date" class="form-label">Ngày đăng</label>
            <input type="date" class="form-control" id="date" name="them_ngaydang" required>
        </div>

        <div class="col-md-5">
            <label for="inputCity" class="form-label">Thể loại</label>
            <select class="form-control" name="theloai_id" id="theloai" required>
                <option selected>Chưa chọn</option>
                <?php 
                    $select_sql = "SELECT *
                                    FROM theloai";
                    $select_res = mysqli_query($conn, $select_sql);

                    //hiển thị dữ liệu
                    while($row = mysqli_fetch_assoc($select_res))
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['tentheloai'] . '</option>';
                    }
                ?>
            </select>
        </div>

        <!-- <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div> -->

        <div class="col-md-2">
            <div class="form-label">&nbsp;</div>
            <button type="submit" class="btn btn-danger" name="themmoi_baitin">Thêm mới</button>
        </div>
    </form> 
    <?php 
        if(isset($_POST['themmoi_baitin']))
        {
            $them_tieude = $_POST['them_tieude'];
            $them_ndtt = $_POST['them_ndtt'];

            //Xử lý ảnh
            $anh = $_FILES['them_anh']['name'];
            $dir = "data_img/";
            if($_FILES['them_anh']['name'] != "")
            {
                $fileupload = $dir . $_FILES['them_anh']['name']; 
                move_uploaded_file($_FILES['them_anh']['tmp_name'], $fileupload); 
            }
            else
            {
                echo "Vui lòng chọn file để upload!";
            }

            $them_ndct = $_POST['them_ndct'];
            $them_ngaydang = $_POST['them_ngaydang'];
            $theloai_id = $_POST['theloai_id'];

            //Xử lý thêm dữ liệu vào bảng baitin
            $sql = "INSERT INTO baitin (tieude, 
                                        noidungtomtat, 
                                        anh,
                                        noidungchitiet,
                                        ngaydang,
                                        theloai_id)
                    VALUES ('$them_tieude',
                            '$them_ndtt',
                            '$anh',
                            '$them_ndct',
                            '$them_ngaydang',
                            '$theloai_id')";
            if(mysqli_query($conn, $sql))
            {
                $_SESSION['them_baitinthanhcong'] = "Thêm mới bài tin thành công";
                echo '<div class="alert alert-success" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;">'.$_SESSION['them_baitinthanhcong'].'</div>';
                unset($_SESSION['them_baitinthanhcong']);
                
            }
            else
            {
                $_SESSION['them_baitinkhongthanhcong'] = "Thêm mới bài tin không thành công";
                echo '<div class="alert alert-danger" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;">'.$_SESSION['them_baitinkhongthanhcong'].'</div>';
                unset($_SESSION['them_baitinkhongthanhcong']);
                
            }
        }
    ?>
</div>