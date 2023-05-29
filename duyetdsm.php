<?php
include_once('conn.php');
if (isset($_POST['xacnhan'])) {

	$songaytra = $_POST['songaytra'];
	$sql_check = "SELECT * from danhsachmuon WHERE tinhtrang='Chờ xét duyệt' and nm='$tendn' ";
	$res_check = mysqli_query($conn,$sql_check);
	if (mysqli_num_rows($res_check) > 0) {
		echo "<script type='text/javascript'>alert('Vui lòng chờ xét duyệt!');</script>";
		echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
	} else {
		
		$sql_sl_dsm = "SELECT * from danhsachmuon WHERE tinhtrang='' and nm='$tendn' ";
		$res_sl_dsm = mysqli_query($conn, $sql_sl_dsm);
		while ($row = $res_sl_dsm-> fetch_assoc()) {
			$nm = $row['nm'];
			$ts = $row['tensach'];
			$slm = $row['soluongmuon'];
			//ngay tra
			$nt = ngaytra($songaytra, date("Y"), date("m"), date("d"));
			$sql_ud_dsm = "UPDATE `danhsachmuon` SET `songaytra`='$songaytra', `tinhtrang`='Chờ xét duyệt', `lanmuon`= `lanmuon`+1 WHERE tinhtrang='' and nm='$tendn' ";
			$conn->query($sql_ud_dsm);
			$sql = "INSERT INTO `phieumuon`(`mapm`, `nguoimuon`, `tensach`, `soluongmuon`, `ngaytra`, `tinhtrang`, `canbo`, `noidung`) VALUES ('','$nm','$ts','$slm','$nt','Chờ xét duyệt', '5', '')";
			$conn->query($sql);
		}
		include_once('auto_increment_pm.php');
		echo "<script type='text/javascript'>alert('Gửi đơn thành công!');</script>";
		echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
	}
}
 

	function ngaytra($songay, $y, $m, $d)
	{
		$year = 0;
		$month = 0;
		$day = 0;
	 	if(check_namnhuan($y)) {
	 		
	 	} else {
	 		if ($songay <=30) {
		 		$td = $songay+$d;
			 	if ($m==1 or $m==3 or $m==5 or $m==7 or $m==8 or $m==10) {
			 		if ($td>31) {
			 			$day = $td-31;
			 			$month = $m+1;
			 			$year = $y;
			 		} else {
			 			$day = $td;
			 			$month = $m;
			 			$year = $y;
			 		}
			 	} elseif ($m==12) {
			 		if ($td>31) {
			 			$day = $td-31;
			 			$month = 1;
			 			$year = $y+1;
			 		} else {
			 			$day = $td;
			 			$month = $m;
			 			$year = $y;
			 		}
			 	} elseif ($m==4 or $m==6 or $m==9 or $m==11) {
			 		if ($td>30) {
			 			$day = $td-30;
			 			$month = $m+1;
			 			$year = $y;
			 		} else {
			 			$day = $td;
			 			$month = $m;
			 			$year = $y;
			 		}
			 	} else {
			 		if ($td>28) {
			 			$day = $td-28;
			 			$month = $m+1;
			 			$year = $y;
			 		} else {
			 			$day = $td;
			 			$month = $m;
			 			$year = $y;
			 		}
			 	}
	 		} elseif ($songay<=45) {
	 			$td = $songay+$d;
			 	if ($m==3 or $m==5 or $m==8 or $m==10) {
			 		if ($td>61) {
			 			$day = $td-61;
			 			$month = $m+2;
			 			$year = $y;
			 		} else {
			 			$day = $td-31;
			 			$month = $m+1;
			 			$year = $y;
			 		}
			 	} elseif ($m==4 or $m==6 or $m==9) {
			 		if ($td>61) {
			 			$day = $td-61;
			 			$month = $m+2;
			 			$year = $y;
			 		} else {
			 			$day = $td-30;
			 			$month = $m+1;
			 			$year = $y;
			 		}
			 	} elseif ($m==1) {
			 		if ($td>59) {
			 			$day = $td-59;
			 			$month = $m+2;
			 			$year = $y;
			 		} else {
			 			$day = $td-31;
			 			$month = $m+1;
			 			$year = $y;
			 		}
			 	} elseif ($m==2) {
			 		if ($td>59) {
			 			$day = $td-59;
			 			$month = $m+2;
			 			$year = $y;
			 		} else {
			 			$day = $td-29;
			 			$month = $m+1;
			 			$year = $y;
			 		}
			 	} elseif ($m==11) {
			 		if ($td>61) {
			 			$day = $td-61;
			 			$month = 1;
			 			$year = $y+1;
			 		} else {
			 			$day = $td-31;
			 			$month = $m+1;
			 			$year = $y;
			 		}
			 	} elseif($m==7) {
			 		if ($td>62) {
			 			$day = $td-62;
			 			$month = $m+2;
			 			$year = $y;
			 		} else {
			 			$day = $td-31;
			 			$month = $m+1;
			 			$year = $y;
			 		} 
			 	} else {
			 		if ($td>62) {
			 			$day = $td-62;
			 			$month = 2;
			 			$year = $y+1;
			 		} else {
			 			$day = $td-31;
			 			$month = 1;
			 			$year = $y+1;
			 		}
			 	}
	 		} else {
	 			if ($m=12) {
			 		$day = $td-90;
			 		$month = 3;
			 		$year = $y+1;
			 	} else {
			 		$day = $td-90;
			 		$month = $m+3;
			 		$year = $y;
			 	}
	 		}
	 	}

	 	return "$year-$month-$day";
	}

	function check_namnhuan($y)
	{
		if (($y % 4 == 0 && $y % 100 != 0) || $y % 400 == 0)
		{
			return true;
		}
		return false;
	}
?>

