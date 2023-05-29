<?php
include_once ('conn.php');
if (isset($_POST['luufile_ctpm'])) {
    $fp = @fopen('document/phieumuon.txt', "w");
  
    // Kiểm tra file mở thành công không
    if (!$fp) {
         echo "<script type='text/javascript'>alert('Mở file không thành công!');</script>";
         echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
    }
    else
    {
        $sql_sl_phieumuon = "
        SELECT phieumuon.id, phieumuon.mapm, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
        INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
        INNER JOIN theloai ON sach.id_theloai = theloai.id
        INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC
        ";
        $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
        while ($row = $result_sl_pm->fetch_assoc()) {
            $data = $row['id'].", ".$row['tendg'].", ".$row['tensach'].", ".$row['tentheloai'].", ".$row['soluongmuon'].", ".$row['ngaytra'].", ".$row['tinhtrang'].", ".$row['tencb'].", ".$row['noidung']."\n";
            fwrite($fp, $data);
        }
        echo "<script type='text/javascript'>alert('Lưu thành công!');</script>";
        echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
    } 
}
?>

