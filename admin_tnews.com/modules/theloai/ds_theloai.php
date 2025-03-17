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
            Danh sách thể loại
        </p>
        <!-- <div class="alert alert-danger" role="alert">Cập nhật tài khoản thành công</div>' -->
        <div id="thongbao">
            <!-- xử lý Sửa -->
            <?php 
                if(isset($_POST['sua']))
                {
                    $id = $_POST['id'];
                    $tentheloai_moi = $_POST['ten_theloai'];
                    $danhmuc_id_moi = $_POST['danhmuc_id'];
                
                    $update_sql = "UPDATE theloai
                                    SET tentheloai = '$tentheloai_moi',
                                        danhmuc_id = '$danhmuc_id_moi'
                                    WHERE id = '$id'";
                    $update_res = mysqli_query($conn, $update_sql);

                    // debug:
                    // echo $id;
                    // echo $tentheloai_moi;
                    // echo $danhmuc_id_moi;
                    // echo $update_sql;
                    if($update_res)
                    {
                        $_SESSION['sua_theloaithanhcong'] = 'Sửa thể loại thành công!';
                        echo '<p style="color: green;">'.$_SESSION['sua_theloaithanhcong'].'</p>';
                        unset($_SESSION['sua_theloaithanhcong']);
                    } 
                    else
                    {
                        $_SESSION['sua_theloaikhongthanhcong'] = 'Sửa thể loại không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['sua_theloaikhongthanhcong'].'</p>';
                        unset($_SESSION['sua_theloaikhongthanhcong']);
                    }
                }
            ?>
            <!-- xử lý xóa -->
            <?php
                if(isset($_POST['xoa']))
                {
                    $id_can_xoa = $_POST['id_theloai_xoa'];

                    $delete_sql = "DELETE 
                                    FROM theloai
                                    WHERE id = '$id_can_xoa'";
                    $delete_res = mysqli_query($conn, $delete_sql);

                    // debug:
                    // echo  $id_can_xoa;
                    // echo $delete_sql;
                    if($delete_res)
                    {
                        $_SESSION['xoa_theloaithanhcong'] = 'Xóa thể loại thành công!';
                        echo '<p style="color: green;">'.$_SESSION['xoa_theloaithanhcong'].'</p>';
                        unset($_SESSION['xoa_theloaithanhcong']);
                    } 
                    else
                    {
                        $_SESSION['xoa_theloaikhongthanhcong'] = 'Xóa thể loại không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['xoa_theloaikhongthanhcong'].'</p>';
                        unset($_SESSION['xoa_theloaikhongthanhcong']);
                    }
                }
            ?>
        </div>
    </div>
    <table class="table table-striped">
        <thead style="font-size: small;">
            <tr>
                <th scope="col" style="width: 30px;">#</th>
                <th scope="col" style="width: 455px;">Tên thể loại</th>
                <th scope="col" style="width: 500px;">Thuộc danh mục</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>

        <tbody style="font-size: small;">
            <?php 
                $sql = "SELECT theloai.id AS id_theloai,
                                theloai.tentheloai,
                                danhmuc.id,
                                danhmuc.tendanhmuc
                        FROM theloai
                        LEFT JOIN danhmuc ON theloai.danhmuc_id = danhmuc.id";
                $res = mysqli_query($conn, $sql);
                $stt = 0;
                while($arr = mysqli_fetch_assoc($res))
                { 
                    $stt++; 
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $arr['tentheloai']; ?></td>
                <td><?php echo $arr['tendanhmuc']; ?></td>
                <td>
                    <a href="#modalSua" data-bs-toggle="modal"
                                onclick = "fillModalData(
                                    '<?php echo $arr['id_theloai']; ?>',
                                    '<?php echo $arr['tentheloai']; ?>'
                                )" 
                                style="background-color: #004370;
                                        color: white;
                                        text-decoration: none;
                                        padding: 5px;
                                        border-radius: 5px;">Sửa</a>
                    <a href="#modalXoa" data-bs-toggle="modal" 
                                onclick = "setXoaId(
                                    '<?php echo $arr['id_theloai']; ?>'
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
                    <input type="hidden" id="idSua" name="id_theloai">
                    <div class="mb-3">
                        <label for="tenthie_loai" class="form-label">Tên thể loại</label>
                        <input type="text" class="form-control" id="ten_theloai" name="ten_theloai" required>
                    </div>
                    <div class="mb-3">
                        <label for="danhmuc" class="form-label">Chọn danh mục</label>
                        <select class="form-select" name="danhmuc_id" id="danhmuc" required>
                            <option value="">Chưa chọn</option>
                            <?php
                                // Lấy danh sách danh mục từ cơ sở dữ liệu
                                $select_sql_danhmuc = "SELECT * FROM danhmuc";
                                $select_res_danhmuc = mysqli_query($conn, $select_sql_danhmuc);
                                while ($row = mysqli_fetch_assoc($select_res_danhmuc)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['tendanhmuc'] . '</option>';
                                }
                            ?>
                        </select>
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
                    <input type="hidden" id="idXoa" name="id_theloai_xoa">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger" name="xoa">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
//hàm lấy giữ liệu
function fillModalData(id, ten_theloai) {
    document.getElementById('idSua').value = id;
    document.getElementById('ten_theloai').value = ten_theloai;
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