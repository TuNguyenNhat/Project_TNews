<style>
    label{
        font-weight: bold;
    }
</style>
<div class="col-md" style="margin-left: 10px; 
                            height: 655px; 
                            background-color:rgb(253, 253, 253); 
                            border: 1px solid #ebebeb;
                            padding: 10px;">
    <p style="text-align: center;
            color: #004370;
            font-weight: bold;">
            Thêm mới thể loại
    </p>

    <form class="row g-3" action="index.php?modules=theloai&action=them_theloai" method="post"  style="margin-bottom: 20px; padding: 10px;">
        <!-- <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div> -->

        <div class="col-md-5">
            <label for="inputZip" class="form-label">Tên thể loại</label>
            <input type="text" class="form-control" id="inputZip" name="ten_theloai" required>
        </div>
        <div class="col-md-5">
            <label for="inputZip" class="form-label">Danh mục</label>
            <select class="form-control" name="danhmuc_id" id="danhmuc">
                <option selected>Chưa chọn</option>
                <?php 
                    $select_sql = "SELECT *
                                    FROM danhmuc";
                    $select_res = mysqli_query($conn, $select_sql);

                    //hiển thị dữ liệu
                    while($row = mysqli_fetch_assoc($select_res))
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['tendanhmuc'] . '</option>';
                    }
                ?>
            </select>
        </div>

        <div class="col-md-2">
            <div class="form-label">&nbsp;</div>
            <button type="submit" class="btn btn-danger" name="themmoi_theloai">Thêm mới</button>
        </div>
    </form> 

    <?php 
        if(isset($_POST['themmoi_theloai']))
        {
            $ten_theloai = $_POST['ten_theloai'];
            $danhmuc_id = $_POST['danhmuc_id'];

            $insert_sql = "INSERT INTO theloai (tentheloai, danhmuc_id)
                            VALUES ('$ten_theloai', '$danhmuc_id')";
            
            $insert_res = mysqli_query($conn, $insert_sql);

            // debug:
            // echo $ten_theloai;
            // echo $insert_sql;
            if($insert_res)
            {
                $_SESSION['them_theloaithanhcong'] = "Thêm mới thể loại thành công";
                echo '<div class="alert alert-success" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;
                                                                    margin-top: 430px;">'.$_SESSION['them_theloaithanhcong'].'</div>';
                unset($_SESSION['them_theloaithanhcong']);
                
            }
            else
            {
                $_SESSION['them_theloaikhongthanhcong'] = "Thêm mới thể loại không thành công";
                echo '<div class="alert alert-danger" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;
                                                                    margin-top: 430px;">'.$_SESSION['them_theloaikhongthanhcong'].'</div>';
                unset($_SESSION['them_theloaikhongthanhcong']);
                
            }
        }
    ?>
</div>