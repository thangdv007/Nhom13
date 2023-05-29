<?php
include_once('conn.php');
    if(isset($_GET['id_s'])) {
        $id = $_GET['id_s']; 
        $tendn = trim($_GET['tendn']);
        $check_sls = "SELECT * FROM sach WHERE id_sach='$id' ";
        $res_check_sls = mysqli_query($conn, $check_sls);
        while ($row=$res_check_sls->fetch_assoc()) {
            if ($row['soluongcon']==0) {
                echo "<script type='text/javascript'>alert('Sách đang được cập nhập!');</script>";
                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
            } else {
                $sql_check_dxd = "SELECT * from danhsachmuon WHERE tinhtrang='Chờ xét duyệt' and nm = '$tendn' ";
                $res_check_dxd = mysqli_query($conn,$sql_check_dxd);

                if (mysqli_num_rows($res_check_dxd) > 0) {
                    echo "<script type='text/javascript'>alert('Vui lòng chờ xét duyệt!');</script>";
                    echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                } else {
                    $sql_check = "SELECT * FROM danhsachmuon WHERE tensach='$id' and nm = '$tendn' ";
                    $ress = mysqli_query($conn, $sql_check);
                    if (mysqli_num_rows($ress) > 0) {
                        while ($row = $ress -> fetch_assoc()) {
                            $slm = $row['soluongmuon'];
                            if ($slm > 2) {
                                include_once('auto_increment_danhsachmuon.php');
                                echo "<script type='text/javascript'>alert('Chỉ được mượn tối đa 3 quyển sách này!');</script>";
                                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                            } else {
                                $sql_update = "UPDATE `danhsachmuon` SET `soluongmuon`=`soluongmuon`+1 WHERE tensach ='$id' and nm = '$tendn' ";
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
                        $sql_add = "INSERT INTO `danhsachmuon`(`nm`,`tensach`, `soluongmuon`) VALUES ('$tendn','$id','1')";
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
        }
    }
?>



