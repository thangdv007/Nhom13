<?php
include_once('conn.php');
$id = $_GET['iddg'];
$tendn = $_GET['id_dn'];
$mokhoa_sql = "UPDATE `docgia` SET `status`='0' WHERE id='$id'";
if ($conn->query($mokhoa_sql)) {
	include_once('auto_increment_docgia.php');
   	echo "<script type='text/javascript'>alert('Mở khóa thành công!');</script>";
   	echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
} else {
    $error = "Lỗi: ".mysqli_error();
}
?>