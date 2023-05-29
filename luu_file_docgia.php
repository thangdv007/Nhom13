<?php
include_once ('conn.php');
if (isset($_POST['luufile_docgia'])) {
    $fp = @fopen('document/docgia.txt', "w");
  
    // Kiểm tra file mở thành công không
    if (!$fp) {
         echo "<script type='text/javascript'>alert('Mở file không thành công!');</script>";
         echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
    }
    else
    {
        $sql = "SELECT * FROM docgia";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row['id'].", ".$row['madg'].", ".$row['matkhau'].", ".$row['tendg'].", ".$row['ngaysinh'].", ".$row['gioitinh'].", ".$row['sdt'].", ".$row['email'].", ".$row['status'].", ".$row['diachi'].", ".$row['role']."\n";
            fwrite($fp, $data);
        }
        echo "<script type='text/javascript'>alert('Lưu thành công!');</script>";
        echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
    } 
}
?>

