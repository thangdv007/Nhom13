<h5 style="color: blue; margin-top: 20px; margin-left: 30px;"> <b>Thông tin cá nhân</b> </h5>
<?php
include ('gconfig.php');
if (isset($_GET['code'])) {
include ('dashboard.php');
$sql_sl_dg = "SELECT * FROM docgia WHERE id = '$tendn' ";
$ress_ = mysqli_query($conn, $sql_sl_dg);
while ($row = $ress_ -> fetch_assoc()) {
?> 
    <div style="margin-top: 40px; margin-left: 45px;">
        <table>
            <tbody>
                <tr style="height: 60px;">
                    <td> Mã độc giả: &ensp;</td>
                    <td> &ensp; <b><?php echo $row['madg'];?></b> </td>
                </tr>

                <tr style="height: 60px;">
                    <td> Tên độc giả: </td>
                    <td> <input type="text" name="tendg" value="<?php echo isset($_POST['tendg']) ? $_POST['tendg'] : $user_name;?>" style="width: 400px; padding-left: 10px;"> </td>
                </tr>

                <tr style="height: 60px;">
                    <td> Ngày sinh: </td>
                    <td> <input type="date" name="ngaysinh" value="<?php echo isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : $row['ngaysinh'];?>" style="width: 400px; padding-left: 10px;"> </td>
                </tr>

                <tr style="height: 60px;">
                    <td> Giới tính: </td>
                    <td> <input type="text" name="gioitinh" value="<?php echo isset($_POST['gioitinh']) ? $_POST['gioitinh'] : $user_gender;?>" style="width: 400px; padding-left: 10px;"> </td>
                </tr>

                <tr style="height: 60px;">
                    <td> Địa chỉ: </td>
                    <td> <input type="text" name="diachi" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : $row['diachi'];?>" style="width: 400px; padding-left: 10px;"> </td>
                </tr>

                <tr style="height: 150px;">
                    <td colspan="3">
                        <?php
                         $img = $user_image;
                        if (!empty($img)) {
                           
                            echo "<img src='$img' style='width: 120px; height:120px; border: 1px solid blue; margin-top:20px; background-color: white;' onclick='triggerClick()' id='display_img' name='name'>";
                            echo "<input type='hidden' name='img' value='$img'>";

                        } else {
                            echo "<img src='img/user90.png' style='width: 120px; height:120px; border: 1px solid blue; margin-top:20px; background-color: white;' onclick='triggerClick()' id='display_img' name='name'>";
                        }
                        ?>
                        &ensp;
                        <label for="upload_img" id="lbl_upload_img" style="text-decoration: underline;">Tải ảnh lên</label>
                        <input type="file" name="upload_img" id="upload_img" onchange="displayImage(this)" style="display: none;">
                        <script>
                            function triggerClick() {
                                document.querySelector('#upload_img').click();
                            }

                            function displayImage(e) {
                                if (e.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.querySelector('#display_img').setAttribute('src', e.target.result);
                                    }
                                    reader.readAsDataURL(e.files[0]);
                                }
                            }
                        </script>
                    </td>
                </tr>

                <tr style="height: 50px;">
                    <td colspan="2" style="text-align: center;"> 
                        <button type="submit" name="luuthaydoi" style="padding:5px 15px 5px 15px;color: white; background-color: #0B74E5; border-radius: 5px; border: 1px solid blue; margin-left: 360px;"> <b>Lưu thay đổi</b> </button>
                        <input type="hidden" name="id_dn" value="<?php echo $tendn; ?>">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr style="width: 1px; height: 580px; background-color: lightgray; margin-top: -570px; margin-left: 620px;">

    <div style="margin-left: 650px; margin-top: -580px;">
        <table>
            <tbody>
                <tr>
                    <td colspan="3"> <b>Số điện thoại và Email</b> </td>
                </tr>

                <tr>
                    <td colspan="2"> <img src="img/phone_.png" style="width: 24px; height: 24px;">&ensp;Số điện thoại <br>
                        &ensp;&ensp;&ensp; <?php echo isset($_POST['sdt']) ? $_POST['sdt'] : $row['sdt'];?>
                    </td>
                    <td> <button type="submit" name="capnhat_sdt" style="color: blue; border-radius: 5px; border: 1px solid blue; margin-left: 90px;"> Cập nhật </button> </td>

                </tr>

                <tr>
                    <td colspan="2"> <img src="img/email.png" style="width: 24px; height: 24px;">&ensp;Email <br>
                        &ensp;&ensp;&ensp; <?php echo $row['email'];?>
                    </td>
                    <td> <button type="submit" name="capnhat_email" style="color: blue; border-radius: 5px; border: 1px solid blue; margin-left: 90px;"> Cập nhật </button> </td>
                </tr>

                <tr style="height: 15px;"></tr>

                <tr>
                    <td colspan="3"> <b>Bảo mật</b> </td>
                </tr>

                <tr>
                    <td colspan="2"><img src="img/password.png" style="width: 24px; height: 24px; margin-top: -5px;">&ensp;Đổi mật khẩu </td>
                    <td> <button type="submit" name="capnhat_matkhau" style="color: blue; border-radius: 5px; border: 1px solid blue; margin-left: 90px;"> Cập nhật </button> </td>
                </tr>

                <tr style="height: 20px;"></tr>

                <tr>
                    <td colspan="3"> <b>Tài chính</b> </td>
                </tr>

                <tr>
                    <td> <img src="img\money.png" style="width: 24px; height: 24px;">&ensp;Số dư tài khoản: &ensp;</td>
                    <td> &ensp; <div style="margin-top: -18px;"><b><label style="color: red;"><?php echo number_format($row['sodu'],0); ?></label></b></div> </td>
                    <td> <button type="submit" name="naptien" style="color: blue; border-radius: 5px; border: 1px solid blue; margin-left: 95px;"> Nạp tiền </button> </td>
                </tr>

                <tr>
                    <td> <img src="img/debt.png">&ensp;Khoản nợ: </td>
                    <td> &ensp; <div style="margin-top: -15px;"><b><label style="color: red; "><?php echo number_format($row['khoanno'],0); ?></label></b></div> </td>
                    <td> <button type="submit" name="thanhtoankhoanno" onclick="return confirm('Bạn muốn thanh toán khoản nợ lâu ngày chưa trả này?')" style="color: blue; border-radius: 5px; border: 1px solid blue; margin-left: 70px;"> Thanh toán </button> </td>
                </tr>

                <tr>
                    <td colspan="3" style="text-align: center;">
                        <img src="img/momo.png" style="width: 32px; height: 32px;">
                        <img src="img/zalopay.png" style="width: 32px; height: 32px;">
                        <img src="img/viettelpay.png" style="width: 32px; height: 32px;">
                        <img src="img/vietcombank.png" style="width: 32px; height: 32px;">
                        <img src="img/techcombank.png" style="width: 32px; height: 32px;">
                        <img src="img/viettinbank.png" style="width: 32px; height: 32px;">
                        <img src="img/bidv.png" style="width: 32px; height: 32px;">
                        <img src="img/agribank.png" style="width: 32px; height: 32px;">
                    </td>    
                </tr>

                <tr style="height: 15px;"></tr>

                <tr>
                    <td colspan="3"> <b>Liên kết mạng xã hội</b> </td>
                </tr>

                <tr>
                    <td colspan="2"> <img src="img/facebook.png" style="margin-top:-5px">&ensp;Facebook </td>
                    <td>
                        <button name="btn_lkfb" style="color: blue; border-radius: 5px; border: 1px solid blue; margin-left: 100px;"> Liên kết </button>

                    </td>
                </tr>

                <tr style="height: 50px;">
                    <td colspan="2"> <img src="img/google.png" style="margin-top:-5px">&ensp;Google </td>
                    <td>
                        <?php
                        $google_login_btn = '<a href="logout.php?logout=" style="text-decoration: none; color: blue;">Hủy</a>';
                        echo '<div align="center" style="color: blue;background-color: white; border-radius: 5px; border: 1px solid blue; margin-left: 100px;">'.$google_login_btn . '</div>';
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php 
    }//while 
} else {
    include ("lkgg.php");
} //endif
?>

