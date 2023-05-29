<?php
include_once('conn.php');
$id = $_GET['idpm'];
$tendn = $_GET['id_dn'];
$delete_sql = "DELETE FROM phieumuon WHERE id=$id";
if ($conn->query($delete_sql)) {
	
	include_once('auto_increment_pm.php');
	echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
	echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&xpm&xpmct'; </script>";
   	
} else {
    $error = "Lỗi: ".mysqli_error();
}
?>