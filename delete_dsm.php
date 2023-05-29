<?php
include_once('conn.php');
$id = $_GET['id_dsm'];
$id_s = $_GET['id_s'];
$tendn = trim($_GET['tendn']);
$sql2 = "SELECT * FROM danhsachmuon WHERE id=$id";
$res = mysqli_query($conn, $sql2);
while ($row=$res->fetch_assoc()) {
	$slm = $row['soluongmuon'];
	$delete_sql = "DELETE FROM danhsachmuon WHERE id=$id";
	if ($conn->query($delete_sql)) {
		$sql = "UPDATE `sach` SET `soluongcon`=`soluongcon` + $slm WHERE id_sach='$id_s' ";
		$conn->query($sql);
		include_once('auto_increment_danhsachmuon.php');
		echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
	   	echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
	} else {
	    echo "Lỗi: ".mysqli_error();
	}
}


?>