<?php
include_once('conn.php');

if(isset($_POST['save'])){
    $madg = trim($_POST['model_madg']);
    $tendg = trim($_POST['modal_tendg']);
    $gioitinh = $_POST['gioitinh1'];
    $sdt = trim($_POST['modal_sdt']);
    $ngaysinh = trim($_POST['modal_ngaysinh']);
    $email = trim($_POST['modal_email']);
    $mk = trim($_POST['modal_mk']);
    $diachi = trim($_POST['modal_dc']);
    $id = trim($_POST['id']) ?? null;
    $role = trim($_POST['role']);
        $sql_ud = "UPDATE `docgia` SET `madg`='$madg', `matkhau`='$mk', `tendg`='$tendg', `ngaysinh`='$ngaysinh', `gioitinh`='$gioitinh', `sdt`='$sdt',`email`='$email', `diachi`='$diachi', `role` = '$role' WHERE id = '$id' ";
        if (mysqli_query($conn, $sql_ud)) {
            echo "<script type='text/javascript'>alert('Thành công!');</script>";
            echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
        } else {
            $mess = "Lỗi: ".mysqli_error();
        }
    
}
?>
