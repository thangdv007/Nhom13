<?php 
if(isset($_POST['themphieumuon'])) {

    $mapm = trim($_POST['maphieumuon']);
    $ngm = trim($_POST['nguoimuon']);
    $tens = trim($_POST['tensach']);
    $slcon = trim($_POST['soluongmuon']);
    $ngaytra = trim($_POST['ngaytrathuc'] ?? null);
    $canbo = trim($_POST['form-select_canbo'] ?? null) ;
    $ttnd = trim($_POST['noidung']);
    isset($_POST['form-select_canbo']);

    if(empty($mapm)){
        $error1 = "Mã phiếu mượn trống!";
    } elseif(empty($ngm)){
        $error1 = "Người mượn trống!";
    } elseif(empty($tens)){
        $error1 = "Tên sách trống!";
    } elseif(empty($slcon)){
        $error1 = "Số lượng mượn trống!";
    } elseif($canbo == null){
        $error1 = "Bạn chưa chọn cán bộ!";
    } elseif (!is_numeric($slcon)) {
        $error1 = "Số lượng chỉ được nhập số!";
    } else {
        $select_id_pm = "SELECT * FROM phieumuon WHERE mapm = '$mapm'";
        $res_id_pm = mysqli_query($conn, $select_id_pm);

        $select_id_dg = "SELECT id FROM docgia WHERE madg = '$ngm'";
        $res_id_dg = mysqli_query($conn, $select_id_dg);

        $select_id_s = "SELECT id_sach FROM sach WHERE tensach = '$tens'";
        $res_id_s = mysqli_query($conn, $select_id_s);

        if (mysqli_num_rows($res_id_pm) > 0) {
            $error1 = "Mã phiếu mượn đã tồn tại";
        } elseif (mysqli_num_rows($res_id_dg) <= 0) {
            $error1 = "Mã độc giả không tồn tại";
        } elseif (mysqli_num_rows($res_id_s) <= 0) {
            $error1 = "Tên sách không tồn tại";
        } else {                
            while ($row = $res_id_dg -> fetch_assoc()) {
                while ($row1 = $res_id_s -> fetch_assoc()) {
                    $id = "".$row['id'];
                    $id_sach = "".$row1['id_sach'];
                    $sql = "INSERT INTO `phieumuon`(`mapm`, `nguoimuon`, `tensach`, `soluongmuon`, `ngaytra`, `tinhtrang`, `canbo`, `noidung`) VALUES ('$mapm','$id','$id_sach','$slcon','$ngaytra','Chưa trả','$canbo','$ttnd')";
                    
                    if (mysqli_query($conn,$sql)) {
                        include_once('auto_increment_pm.php');
                        $error1 = "Thành công!";
                    } else {
                        $error1 = "Lỗi: ".mysqli_error();
                    }


                }
            }
        }
        
    }
}
?>