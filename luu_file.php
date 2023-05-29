<?php
include_once ('conn.php');
if (isset($_POST['luufile'])) {
    $fp = @fopen('document/sach.txt', "w");
  
    // Kiểm tra file mở thành công không
    if (!$fp) {
         echo "<script type='text/javascript'>alert('Mở file không thành công!');</script>";
         echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&x'; </script>";
    }
    else
    {
        $sql = "SELECT * FROM sach
        INNER JOIN theloai ON sach.id_theloai = theloai.id";
        $res = mysqli_query($conn, $sql);
        while ($row = $res -> fetch_assoc()) {
            $data = $row['id_sach'].", ".$row['tentheloai'].", ".$row['soluongcon'].", ".$row['tacgia'].", ".$row['nxb'].", ".$row['gia'].", ".$row['tomtatnoidung']."\n";
            fwrite($fp, $data);
        }
        
        echo "<script type='text/javascript'>alert('Lưu thành công!');</script>";
        echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&x'; </script>";
    } 
}
?>

