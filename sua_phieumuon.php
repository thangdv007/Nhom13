<?php
include_once('conn.php');

if(isset($_POST['save_suapm'])){
    $madg = trim($_POST['modal_madg']);
    $mas = trim($_POST['modal_masach']);
    $sl = trim($_POST['modal_solg']);
    $tg = trim($_POST['modal_tg']);
    $tt = trim($_POST['tinhtrang']);
    $cb = trim($_POST['modal_cb']);
    $nd = trim($_POST['modal_nd']) ?? null;
    $id = trim($_POST['id_pm']) ?? null;

    $sl_id_dg = "SELECT * FROM docgia WHERE madg='$madg' ";
    $res_sldg = mysqli_query($conn, $sl_id_dg);

    $sl_id_sach = "SELECT * FROM sach WHERE tensach='$mas' ";
    $res_sls = mysqli_query($conn, $sl_id_sach);

	$sl_id_cb = "SELECT * FROM thuthu WHERE tencb='$cb' ";
    $res_cb = mysqli_query($conn, $sl_id_cb);

    if (mysqli_num_rows($res_sldg) > 0) {
        if (mysqli_num_rows($res_sls) > 0) {
        	if (mysqli_num_rows($res_cb) > 0) {
	        	while ($row=$res_sldg->fetch_assoc()) {
			        while ($rows=$res_sls->fetch_assoc()) {
			        	while ($rowcb=$res_cb->fetch_assoc()) {
							$id_nm = $row['id'];
					       	$id_sach = $rows['id_sach'];
					       	$id_cb = $rowcb['id'];
					       	$sql_ud = "UPDATE `phieumuon` SET `nguoimuon`='$id_nm',`tensach`='$id_sach',`soluongmuon`='$sl',`ngaytra`='$tg',`tinhtrang`='$tt',`canbo`='$id_cb',`noidung`='$nd' WHERE id='$id' ";
						    if (mysqli_query($conn, $sql_ud)) {
						        echo "<script type='text/javascript'>alert('Sửa phiếu mượn thành công!');</script>";
						        echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&xpm&xpmct'; </script>";
						    } else {
						        $mess = "Lỗi: ".mysqli_error();
						    }
			        	}
			        }
			    }
		    } else {
		        echo "<script type='text/javascript'>alert('Cán bộ không tồn tại!');</script>";
		    }
	    } else {
	        echo "<script type='text/javascript'>alert('Mã sách không tồn tại!');</script>";
	    }
    } else {
        echo "<script type='text/javascript'>alert('Mã độc giả không tồn tại!');</script>";
    }
    
}
?>
