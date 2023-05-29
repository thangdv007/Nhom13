<?php
include_once('conn.php');
if(isset($_POST['themdg'])){
    $madg = trim($_POST['madg']);
    $tendg = trim($_POST['tendg']);
    $gioitinh = $_POST['gioitinh'];
    $sdt = trim($_POST['sdt']);
    $ngaysinh = trim($_POST['ngaysinh']);
    $email = trim($_POST['email']);
    $mk = trim($_POST['mk']);
    $diachi = trim($_POST['diachi']);
    $role = trim($_POST['role']);
    
    if(empty($madg)){
        $error = "Mã độc giả trống!";
    } elseif(empty($mk)){
        $error = "Mật khẩu trống!";
    } elseif(empty($tendg)){
        $error = "Tên độc giả trống!";
    } elseif(empty($sdt)){
        $error = "Số điện thoại trống!";
    } elseif(empty($diachi)){
        $error = "Địa chỉ trống!";
    } elseif(empty($email)){
        $error = "Email trống!";
    } elseif (!is_numeric($sdt)) {
        $error = "Số điện thoại chỉ được nhập số!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không đúng định dạng!";
    } else {
        $sql_madg = "SELECT * FROM docgia WHERE madg = '$madg'";
        $count_madg = mysqli_query($conn, $sql_madg);

        $sql_sdt = "SELECT * FROM docgia WHERE sdt = '$sdt'";
        $count_sdt = mysqli_query($conn, $sql_sdt);

        $sql_email = "SELECT * FROM docgia WHERE email = '$email'";
        $count_email = mysqli_query($conn, $sql_email);

        if (mysqli_num_rows($count_madg) > 0) {
            $error = "Mã độc giả đã tồn tại!";
        }elseif (mysqli_num_rows($count_sdt) > 0) {
            $error = "Số điện thoại này đã được đăng ký!";
        }elseif (mysqli_num_rows($count_email) > 0) {
            $error = "Email này đã tồn tại!";
        } else {
            $sql_add = "INSERT INTO `docgia`(`madg`, `matkhau`, `tendg`, `ngaysinh`, `gioitinh`, `sdt`, `email`, `status`, `diachi`, `role`) VALUES ('$madg','$mk','$tendg','$ngaysinh','$gioitinh','$sdt','$email','true','$diachi', '$role')";
            if(mysqli_query($conn,$sql_add)) {
                include_once('auto_increment_docgia.php');
                $error = "Thành công!";
            } else {
                 $error = "Lỗi: ".mysqli_error();
            }
        }
        
    }
}
?>
