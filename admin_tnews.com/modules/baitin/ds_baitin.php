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
            Danh sách bài tin
        </p>
        <!-- <div class="alert alert-danger" role="alert">Cập nhật tài khoản thành công</div>' -->
        <div id="thongbao">
            <!-- xử lý Sửa -->
            <?php 
                if(isset($_POST['sua']))
                {
                    $id = $_POST['id_baitin_moi'];
                    $tentieude_moi = $_POST['tieude_moi'];
                    $ndtt_moi = $_POST['ndtt_moi'];

                    $anh = $_FILES['anh_moi']['name'];
                    $dir = "data_img/";
                    if($_FILES['anh_moi']['name'] != "")
                    {
                        $fileupload = $dir . $_FILES['anh_moi']['name']; 
                        move_uploaded_file($_FILES['anh_moi']['tmp_name'], $fileupload); 
                    }
                    else
                    {
                        echo "Vui lòng chọn file để upload!";
                    }

                    $ngaydang_moi = $_POST['ngaydang'];
                    $theloai_moi = $_POST['theloai_id'];
                
                    $update_sql = "UPDATE baitin
                                    SET tieude = '$tentieude_moi',
                                        noidungtomtat = '$ndtt_moi',
                                        anh = '$anh',
                                        ngaydang = '$ngaydang_moi',
                                        theloai_id = '$theloai_moi'
                                    WHERE id = '$id'";
                    $update_res = mysqli_query($conn, $update_sql);

                    // debug:
                    // echo $id;
                    // echo $theloai_moi;
                    // echo $update_sql;
                    if($update_res)
                    {
                        $_SESSION['sua_baitinthanhcong'] = 'Sửa bài tin thành công!';
                        echo '<p style="color: green;">'.$_SESSION['sua_baitinthanhcong'].'</p>';
                        unset($_SESSION['sua_baitinthanhcong']);
                    } 
                    else
                    {
                        $_SESSION['sua_baitinkhongthanhcong'] = 'Sửa bài tin không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['sua_baitinkhongthanhcong'].'</p>';
                        unset($_SESSION['sua_baitinkhongthanhcong']);
                    }
                }
            ?>
            <!-- xử lý xóa -->
            <?php
                if(isset($_POST['xoa']))
                {
                    $id_can_xoa = $_POST['id_baitin_xoa'];

                    $delete_sql = "DELETE 
                                    FROM baitin
                                    WHERE id = '$id_can_xoa'";
                    $delete_res = mysqli_query($conn, $delete_sql);

                    // debug:
                    // echo  $id_can_xoa;
                    // echo $delete_sql;
                    if($delete_res)
                    {
                        $_SESSION['xoa_baitinthanhcong'] = 'Xóa bài tin thành công!';
                        echo '<p style="color: green;">'.$_SESSION['xoa_baitinthanhcong'].'</p>';
                        unset($_SESSION['xoa_baitinthanhcong']);
                    } 
                    else
                    {
                        $_SESSION['xoa_baitinkhongthanhcong'] = 'Xóa bài tin không thành công!';
                        echo '<p style="color: red;">'.$_SESSION['xoa_baitinkhongthanhcong'].'</p>';
                        unset($_SESSION['xoa_baitinkhongthanhcong']);
                    }
                }
            ?>
        </div>
    </div>
    <table class="table table-striped">
        <thead style="font-size: small;">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 250px;">Tên tiêu đề </th>
                <th scope="col" style="width: 350px;">Nội dung tóm tắt</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Ngày đăng</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>

        <tbody style="font-size: small;">
            <?php 
                $sql = "SELECT baitin.id AS id_baitin,
                                baitin.tieude,
                                baitin.noidungtomtat,
                                baitin.anh,
                                baitin.ngaydang,
                                theloai.tentheloai
                        FROM baitin
                        LEFT JOIN theloai ON baitin.theloai_id = theloai.id";
                $res = mysqli_query($conn, $sql);
                $stt = 0;
                while($arr = mysqli_fetch_array($res))
                { 
                    $stt++; 
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $arr['tieude']; ?></td>
                <td><?php echo $arr['noidungtomtat']; ?></td>
                <td><img src="data_img/<?php echo $arr['anh']; ?>" alt="" width="150px" height="100px"></td>
                <td><?php echo $arr['ngaydang']; ?></td>
                <td><?php echo $arr['tentheloai']; ?></td>
                <td>
                    <a href="#modalSua" data-bs-toggle="modal"
                                onclick = "fillModalData(
                                    '<?php echo $arr['id_baitin']; ?>',
                                    '<?php echo $arr['tieude']; ?>',
                                    '<?php echo $arr['noidungtomtat']; ?>',
                                    '<?php echo $arr['anh']; ?>',
                                    '<?php echo $arr['ngaydang']; ?>'
                                )" 
                                style="background-color: #004370;
                                        color: white;
                                        text-decoration: none;
                                        padding: 5px;
                                        border-radius: 5px;">Sửa</a>
                    <a href="#modalXoa" data-bs-toggle="modal" 
                                onclick = "setXoaId(
                                    '<?php echo $arr['id_baitin']; ?>'
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
                <h5 class="modal-title" style="color: #004370;">Sửa bài tin</h5>
                <a href="#" data-bs-dismiss="modal" aria-label="Close">&times;</a>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="" id="idSua_baitin" name="id_baitin_moi">
                    <div class="mb-3">
                        <label for="tenthie_loai" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="tieude" name="tieude_moi" required>
                    </div>
                    <div class="mb-3">
                        <label for="tenthie_loai" class="form-label">Nội dung tóm tắt</label>
                        <textarea class="form-control" id="ndtt_moi" name="ndtt_moi" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="anh" class="form-label">Chọn ảnh</label>
                        <input type="file" class="form-control" id="anh" name="anh_moi" required>
                    </div>
                    <div class="mb-3">
                        <label for="ngaydang" class="form-label">Ngày đăng</label>
                        <input type="date" class="form-control" id="ngaydang" name="ngaydang" required>
                    </div>
                    <div class="mb-3">
                        <label for="danhmuc" class="form-label">Chọn thể loại</label>
                        <select class="form-select" name="theloai_id" id="theloai" required>
                            <option value="">Chưa chọn</option>
                            <?php
                                // Lấy danh sách danh mục từ cơ sở dữ liệu
                                $select_sql_theloai = "SELECT * FROM theloai";
                                $select_res_theloai = mysqli_query($conn, $select_sql_theloai);
                                while ($row = mysqli_fetch_assoc($select_res_theloai)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['tentheloai'] . '</option>';
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
                <p>Bạn có chắc chắn muốn xóa bài tin này không?</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="">
                    <input type="" id="idXoa" name="id_baitin_xoa">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger" name="xoa">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
//hàm lấy giữ liệu
function fillModalData(id_baitin_moi, tieude_moi, ndtt_moi, anh_moi, ngaydang) {
    document.getElementById('idSua_baitin').value = id_baitin_moi;
    document.getElementById('tieude').value = tieude_moi;
    document.getElementById('ndtt_moi').value = ndtt_moi;
    document.getElementById('anh').value = anh_moi;
    document.getElementById('ngaydang').value = ngaydang;
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