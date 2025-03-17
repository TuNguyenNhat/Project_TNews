<div class="col-md" style="margin-left: 10px; 
                            height: 655px; 
                            background-color:rgb(253, 253, 253); 
                            border: 1px solid #ebebeb;
                            padding: 10px;">
    <p style="text-align: center;
            color: #004370;
            font-weight: bold;">
            Thêm mới danh mục
    </p>

    <form class="row g-3" action="index.php?modules=danhmuc&action=them_danhmuc" method="post"  style="margin-bottom: 20px; padding: 10px;">
        <!-- <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div> -->

        <div class="col-md-5">
            <label for="inputZip" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="inputZip" name="ten_danhmuc" required>
        </div>

        <div class="col-md-2">
            <div class="form-label">&nbsp;</div>
            <button type="submit" class="btn btn-danger" name="themmoi_danhmuc">Thêm mới</button>
        </div>
    </form> 
    <?php 
        if(isset($_POST['themmoi_danhmuc']))
        {
            $them_danhmuc = $_POST['ten_danhmuc'];

            $sql = "INSERT INTO danhmuc (tendanhmuc)
                    VALUES ('$them_danhmuc')";
            
            $insert_res = mysqli_query($conn, $sql);

            //debug
            // echo $them_danhmuc;
            // echo $sql;
            if($insert_res)
            {
                $_SESSION['them_danhmucthanhcong'] = "Thêm mới danh mục thành công";
                echo '<div class="alert alert-success" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;
                                                                    margin-top: 430px;">'.$_SESSION['them_danhmucthanhcong'].'</div>';
                unset($_SESSION['them_danhmucthanhcong']);
                
            }
            else
            {
                $_SESSION['them_danhmuckhongthanhcong'] = "Thêm mới danh mục không thành công";
                echo '<div class="alert alert-danger" role="alert" style="width: 500px; 
                                                                    margin-left: 570px;
                                                                    margin-top: 430px;">'.$_SESSION['them_danhmuckhongthanhcong'].'</div>';
                unset($_SESSION['them_danhmuckhongthanhcong']);
                
            }
        }
    ?>
</div>