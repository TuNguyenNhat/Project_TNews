<div class="col-md" style="margin-left: 10px; 
                            overflow: scroll; 
                            height: 655px;
                            background-color:rgb(253, 253, 253); 
                            border: 1px solid #ebebeb;
                            padding: 10px;">

    <p style="text-align: center;
            color: #004370;
            font-weight: bold;">
            Danh sách tài khoản
    </p>
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
                    <a href="#" style="background-color: #004370;
                                        color: white;
                                        text-decoration: none;
                                        padding: 5px;
                                        border-radius: 5px;">Sửa</a>
                    <a href="" style="background-color: #004370;
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