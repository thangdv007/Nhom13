<?php
include_once('conn.php');
$id = $_GET['iddg'];
$tendn = $_GET['id_dn'];
$delete_sql = "DELETE FROM docgia WHERE id=$id";
if ($conn->query($delete_sql)) {
	include_once('auto_increment_docgia.php');
   	echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
   	echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
} else {
    $error = "Lỗi: ".mysqli_error();
}
?>