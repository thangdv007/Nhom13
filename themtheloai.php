<?php
if(isset($_POST['themtheloai'])) {
    $matl = trim($_POST['matheloai']);
    $tl = trim($_POST['tentheloai']);
    if(empty($matl)){
        $error1 = "Mã thể loại trống!";
    } elseif(empty($tl)){
        $error1 = "Tên thể loại trống!";
    } else {
        $sql_matl = " SELECT * FROM theloai WHERE matheloai = '$matl' ";
        $count_matl = mysqli_query($conn, $sql_matl);

        $sql_matl2 = " SELECT * FROM theloai WHERE tentheloai = '$tl' ";
        $count_matl2 = mysqli_query($conn, $sql_matl2);

        if (mysqli_num_rows($count_matl) > 0) {
            $error1 = "Mã thể loại đã tồn tại!";
        } elseif (mysqli_num_rows($count_matl2) > 0) {
            $error1 = "Tên thể đã được thêm vào danh sách!";
        } else {
            $sql_add_sach = "INSERT INTO `theloai`(`matheloai`, `tentheloai`) VALUES ('$matl','$tl')";
            if(mysqli_query($conn,$sql_add_sach)) {
                include_once('auto_increment_theloai.php');
                $error1 = "Thành công!";
            } else {
                $error1 = "Lỗi: ".mysqli_error();
            }
        }     
    }
}
?>