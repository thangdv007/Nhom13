<?php
include_once('conn.php');
$id = $_GET['iddg'];
$tendn = $_GET['id_dn'];
$khoa_sql = "UPDATE `docgia` SET `status`='1' WHERE id='$id'";
if ($conn->query($khoa_sql)) {
	
	include_once('auto_increment_docgia.php');
   	echo "<script type='text/javascript'>alert('Khóa thành công!');</script>";
   	echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
   	
} else {
    $error = "Lỗi: ".mysqli_error();
}
?>
