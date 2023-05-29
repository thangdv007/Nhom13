<?php
include_once('conn.php');
    if(isset($_POST['themvaodsm'])) {
        $id = $_POST['id_s'];
        $tendn = trim($_POST['id_dn']);
        $sql_check_dxd = "SELECT * from danhsachmuon WHERE tinhtrang='Chờ xét duyệt' ";
        $res_check_dxd = mysqli_query($conn,$sql_check_dxd);
        if (mysqli_num_rows($res_check_dxd) > 0) {
            require_once 'TrangChuDocGia.php';
            echo "<script type='text/javascript'>alert('Vui lòng chờ xét duyệt!');</script>";
        } else {
            $sql_check = "SELECT * FROM danhsachmuon WHERE tensach='$id' ";
            $ress = mysqli_query($conn, $sql_check);
            if (mysqli_num_rows($ress) > 0) {
                while ($row = $ress -> fetch_assoc()) {
                    $slm = $row['soluongmuon'];
                    if ($slm > 2) {
                        include_once('auto_increment_danhsachmuon.php');
                        echo "<script type='text/javascript'>alert('Chỉ được mượn tối đa 3 quyển sách này!');</script>";
                        echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                    } else {
                        $sql_update = "UPDATE `danhsachmuon` SET `soluongmuon`=`soluongmuon`+1 WHERE tensach ='$id' ";
                        if (mysqli_query($conn, $sql_update)) {
                            $sql = "UPDATE `sach` SET `soluongcon`=`soluongcon` - 1 WHERE id_sach='$id' ";
                            $conn->query($sql);
                            include_once('auto_increment_danhsachmuon.php');
                            echo "<script type='text/javascript'>alert('Đã thêm vào danh sách mượn!');</script>";
                            echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                        } else {
                            echo "Lỗi: ".mysqli_error();
                        }
                    }
                }
                
            } else {
                $sql_add = "INSERT INTO `danhsachmuon`(`nm`, `tensach`, `soluongmuon`) VALUES ('$tendn', '$id','1')";
                if (mysqli_query($conn, $sql_add)) {
                    $sql = "UPDATE `sach` SET `soluongcon`=`soluongcon` - 1 WHERE id_sach='$id' ";
                    $conn->query($sql);
                    include_once('auto_increment_danhsachmuon.php');
                    echo "<script type='text/javascript'>alert('Đã thêm vào danh sách mượn!');</script>";
                    echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                } else {
                    echo "Lỗi: ".mysqli_error();
                }
            }
        }
    }
?>



