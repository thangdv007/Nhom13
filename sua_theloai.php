<?php
include_once('conn.php');

if(isset($_POST['save_suatl'])){
    $id = trim($_POST['id_tl']);
    $matl = trim($_POST['modal_mtl']);
    $tl = trim($_POST['modal_ttl']);
	$sql_ud = "UPDATE `theloai` SET `matheloai`='$matl',`tentheloai`='$tl' WHERE id='$id' ";
    if (mysqli_query($conn, $sql_ud)) {
       echo "<script type='text/javascript'>alert('Thành công!');</script>";
       echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&xtl'; </script>";
    } else {
      $mess = "Lỗi: ".mysqli_error();
    }
}
?>

