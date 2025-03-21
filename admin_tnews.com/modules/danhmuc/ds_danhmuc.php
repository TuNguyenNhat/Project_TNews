<div class="col-md" style="margin-left: 10px; 
                            overflow: scroll; 
                            height: 655px;
                            background-color:rgb(253, 253, 253); 
                            border: 1px solid #ebebeb;
                            padding: 10px;">

    <div style="display: flex;
                justify-content: space-between;">
        <p style="text-align: center;
                color: #004370;
                font-weight: bold;">
            Danh sách danh mục
        </p>
        <!-- <div class="alert alert-danger" role="alert">Cập nhật tài khoản thành công</div>' -->
        <div id="thongbao">
            <!-- xử lý Sửa -->
            <?php 
                if(isset($_POST['sua']))
                {
                    $id = $_POST['id'];
                    $tendanhmuc_moi = $_POST['tendanhmuc'];
                
                    $update_sql = "UPDATE danhmuc
                                    SET tendanhmuc = '$tendanhmuc_moi'
                                    WHERE id = '$id'";
                    $update_res = mysqli_query($conn, $update_sql);
                    if($update_res)
                    {
                        $_SESSION['sua_danhmucthanhcong'] = 'Sửa danh mục thành công!';
                        echo '<p style="color: green;">'.$_SESSION['sua_danhmucthanhcong'].'</p>';
                        unset($_SESSION['sua_danhmucthanhcong']);
                    } 
                    else
                    {
                        $_SESSION['sua_danhmuckhongthanhcong'] = 'Sửa danh mục không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['sua_danhmuckhongthanhcong'].'</p>';
                        unset($_SESSION['sua_danhmuckhongthanhcong']);
                    }
                }
            ?>
            <!-- xử lý xóa -->
            <?php
                if(isset($_POST['xoa']))
                {
                    $id_can_xoa = $_POST['id_xoa'];

                    $delete_sql = "DELETE 
                                    FROM danhmuc
                                    WHERE id = '$id_can_xoa'";
                    $delete_res = mysqli_query($conn, $delete_sql);

                    if($delete_res)
                    {
                        $_SESSION['xoa_danhmucthanhcong'] = 'Xóa danh mục thành công!';
                        echo '<p style="color: green;">'.$_SESSION['xoa_danhmucthanhcong'].'</p>';
                        unset($_SESSION['xoa_danhmucthanhcong']);
                    } 
                    else
                    {
                        $_SESSION['xoa_danhmuckhongthanhcong'] = 'Xóa danh mục không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['xoa_danhmuckhongthanhcong'].'</p>';
                        unset($_SESSION['xoa_danhmuckhongthanhcong']);
                    }
                }
            ?>
        </div>
    </div>
    <table class="table table-striped">
        <thead style="font-size: small;">
            <tr>
                <th scope="col" style="width: 30px;">#</th>
                <th scope="col" style="width: 954px;">Tên danh mục</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>

        <tbody style="font-size: small;">
            <?php 
                $sql = "SELECT * 
                        FROM danhmuc";
                $res = mysqli_query($conn, $sql);
                $stt = 0;
                while($arr = mysqli_fetch_assoc($res))
                { 
                    $stt++; 
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $arr['tendanhmuc']; ?></td>
                <td>
                    <a href="#modalSua" data-bs-toggle="modal"
                                onclick = "fillModalData(
                                    '<?php echo $arr['id']; ?>',
                                    '<?php echo $arr['tendanhmuc']; ?>',
                                )" 
                                style="background-color: #004370;
                                        color: white;
                                        text-decoration: none;
                                        padding: 5px;
                                        border-radius: 5px;">Sửa</a>
                    <a href="#modalXoa" data-bs-toggle="modal" 
                                onclick = "setXoaId(
                                    '<?php echo $arr['id']; ?>'
                                )"
                                style="background-color: #004370;
                                        color: white;
                                        text-decoration: none;
                                        padding: 5px;
                                        border-radius: 5px;">Xóa</a>
                </td>
            </tr>

            <?php 
                } 
            ?>
        </tbody>
    </table>

</div>

<!-- Modal Sửa -->
<div id="modalSua" class="modal fade" tabindex="-1" aria-labelledby="modalSuaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" style="color: #004370;">Sửa danh mục</h5>
                <a href="#" data-bs-dismiss="modal" aria-label="Close">&times;</a>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <input type="hidden" id="idSua" name="id">
                    <div class="mb-3">
                        <label for="tendanhmuc" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="sua">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xác Nhận Xóa -->
<div id="modalXoa" class="modal fade" tabindex="-1" aria-labelledby="modalXoaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" style="color: #004370;">Xác nhận xóa</h5>
                <a href="#" data-bs-dismiss="modal" aria-label="Close">&times;</a>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa danh mục này không?</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="">
                    <input type="hidden" id="idXoa" name="id_xoa">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger" name="xoa">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
//hàm lấy giữ liệu
function fillModalData(id, tendanhmuc) {
    document.getElementById('idSua').value = id;
    document.getElementById('tendanhmuc').value = tendanhmuc;
}

//hàm set thời gian hiển thị thông báo
setTimeout(function() {
    thongbao.style.display = 'none';
}, 1500);

//hàm xóa id
function setXoaId(id) {
    document.getElementById('idXoa').value = id;
}
</script>