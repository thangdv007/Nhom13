<?php
include_once('conn.php');
if(isset($_GET['ids'])) {
	$id = $_GET['ids'];
	$tendn = $_GET['id_dn'];
	$delete_sql = "DELETE FROM sach WHERE id_sach=$id";
	if ($conn->query($delete_sql)) {
		include_once('auto_increment_themsach.php');
	   	echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
	   	echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&x'; </script>";
	} else {
	    $error = "Lỗi: ".mysqli_error();
	}
}
?>