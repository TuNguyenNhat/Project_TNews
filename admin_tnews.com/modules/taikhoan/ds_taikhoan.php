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
            Danh sách tài khoản
        </p>
        <!-- <div class="alert alert-danger" role="alert">Cập nhật tài khoản thành công</div>' -->
        <div id="thongbao">
            <!-- xử lý Sửa -->
            <?php 
                if(isset($_POST['sua']))
                {
                    $id = $_POST['id'];
                    $tennd_moi = $_POST['tennguoidung'];
                    $tendn_moi = $_POST['tendangnhap'];
                    $mk_moi = $_POST['matkhau'];
                    $gmail_moi = $_POST['gmail'];
                    $sdt_moi = $_POST['sdt'];
                    $diachi_moi = $_POST['diachi'];
                    $trangthai_moi = $_POST['trangthai'];
                
                    $update_sql = "UPDATE taikhoan
                                    SET tennguoidung = '$tennd_moi',
                                        tendangnhap = '$tendn_moi',
                                        matkhau = '$mk_moi',
                                        gmail = '$gmail_moi',
                                        sdt = '$sdt_moi',
                                        diachi = '$diachi_moi',
                                        trangthai = '$trangthai_moi'
                                    WHERE id = '$id'";
                    $update_res = mysqli_query($conn, $update_sql);
                    if($update_res)
                    {
                        $_SESSION['sua_taikhoanthanhcong'] = 'Sửa tài khoản thành công!';
                        echo '<p style="color: green;">'.$_SESSION['sua_taikhoanthanhcong'].'</p>';
                        unset($_SESSION['sua_taikhoanthanhcong']);
                    } 
                    else
                    {
                        $_SESSION['sua_taikhoankhongthanhcong'] = 'Sửa tài khoản không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['sua_taikhoankhongthanhcong'].'</p>';
                        unset($_SESSION['sua_taikhoankhongthanhcong']);
                    }
                }
            ?>
            <!-- xử lý xóa -->
            <?php
                if(isset($_POST['xoa']))
                {
                    $id_can_xoa = $_POST['id_xoa'];

                    $delete_sql = "DELETE 
                                    FROM taikhoan
                                    WHERE id = '$id_can_xoa'";
                    $delete_res = mysqli_query($conn, $delete_sql);

                    if($delete_res)
                    {
                        $_SESSION['xoa_taikhoanthanhcong'] = 'Xóa tài khoản thành công!';
                        echo '<p style="color: green;">'.$_SESSION['xoa_taikhoanthanhcong'].'</p>';
                        unset($_SESSION['xoa_taikhoanthanhcong']);
                    } 
                    else
                    {
                        $_SESSION['xoa_taikhoankhongthanhcong'] = 'Xóa tài khoản không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['xoa_taikhoankhongthanhcong'].'</p>';
                        unset($_SESSION['xoa_taikhoankhongthanhcong']);
                    }
                }
            ?>
        </div>
    </div>
    <table class="table table-striped">
        <thead style="font-size: small;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Tên đăng nhập</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Gmail</th>
                <th scope="col">Sđt</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>

        <tbody style="font-size: small;">
            <?php 
                $sql = "SELECT * 
                        FROM taikhoan";
                $res = mysqli_query($conn, $sql);
                $stt = 0;
                while($arr = mysqli_fetch_assoc($res))
                { 
                    $stt++; 
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $arr['tennguoidung']; ?></td>
                <td><?php echo $arr['tendangnhap']; ?></td>
                <td><?php echo $arr['matkhau']; ?></td>
                <td><?php echo $arr['gmail']; ?></td>
                <td><?php echo $arr['sdt']; ?></td>
                <td><?php echo $arr['diachi']; ?></td>
                <td><?php echo $arr['trangthai']; ?></td>
                <td>
                    <a href="#modalSua" data-bs-toggle="modal"
                                onclick = "fillModalData(
                                    '<?php echo $arr['id']; ?>',
                                    '<?php echo $arr['tennguoidung']; ?>',
                                    '<?php echo $arr['tendangnhap']; ?>',
                                    '<?php echo $arr['matkhau']; ?>',
                                    '<?php echo $arr['gmail']; ?>',
                                    '<?php echo $arr['sdt']; ?>',
                                    '<?php echo $arr['diachi']; ?>',
                                    '<?php echo $arr['trangthai']; ?>'
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
                <h5 class="modal-title" style="color: #004370;">Sửa tài khoản</h5>
                <a href="#" data-bs-dismiss="modal" aria-label="Close">&times;</a>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <input type="hidden" id="idSua" name="id">
                    <div class="mb-3">
                        <label for="tennguoidung" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control" id="tennguoidung" name="tennguoidung" required>
                    </div>
                    <div class="mb-3">
                        <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
                    </div>
                    <div class="mb-3">
                        <label for="tendangnhap" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" id="matkhau" name="matkhau" required>
                    </div>
                    <div class="mb-3">
                        <label for="gmail" class="form-label">Gmail</label>
                        <input type="email" class="form-control" id="gmail" name="gmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="number" class="form-control" id="sdt" name="sdt" required>
                    </div>
                    <div class="mb-3">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" required>
                    </div>
                    <div class="mb-3">
                        <label for="diachi" class="form-label">Trạng thái</label>
                        <input type="number" class="form-control" id="trangthai" name="trangthai" required>
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
                <p>Bạn có chắc chắn muốn xóa tài khoản này không?</p>
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
function fillModalData(id, tennguoidung, tendangnhap, matkhau, gmail, sdt, diachi, trangthai) {
    document.getElementById('idSua').value = id;
    document.getElementById('tennguoidung').value = tennguoidung;
    document.getElementById('tendangnhap').value = tendangnhap;
    document.getElementById('matkhau').value = matkhau;
    document.getElementById('gmail').value = gmail;
    document.getElementById('sdt').value = sdt;
    document.getElementById('diachi').value = diachi;
    document.getElementById('trangthai').value = trangthai;
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