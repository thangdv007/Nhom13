<?php 
if(isset($_POST['themsach'])) {
    $mas = trim($_POST['gia']);
    $tens = trim($_POST['tensach']);
    $tl = trim($_POST['form-select_tl'] ?? null);
    $slcon = trim($_POST['soluongcon']);
    $tg = trim($_POST['tacgia']);
    $nxb = trim($_POST['nxb']);
    $ttnd = trim($_POST['tomtatnoidung']);
    if(empty($tens)){
        $error1 = "Tên sách trống!";
    } elseif($tl == null){
        $error1 = "Bạn chưa chọn thể loại!";
    } elseif(empty($slcon)){
        $error1 = "Số lượng còn trống!";
    } elseif(empty($tg)){
        $error1 = "Tác giả trống!";
    }  elseif(empty($nxb)){
        $error1 = "Nhà xuất bản trống!";
    } elseif(empty($mas)){
        $error1 = "Giá sách trống!";
    } elseif (!is_numeric($slcon)) {
        $error1 = "Số lượng chỉ được nhập số!";
    } else {
        
        $sql_add_sach = "INSERT INTO `sach`(`gia`, `tensach`, `soluongcon`, `tacgia`, `nxb`, `tomtatnoidung`, `id_theloai`) VALUES ('$mas','$tens','$slcon','$tg','$nxb','$ttnd','$tl')";
        if(mysqli_query($conn,$sql_add_sach)) {
            include_once('auto_increment_themsach.php');
            $error = "Thành công!";
        } else {
            $error = "Lỗi: ".mysqli_error();
        }
        

    }
}
?>