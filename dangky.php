<?php
include_once('conn.php');
if(isset($_POST['dangky'])) {
    $tendn = trim($_POST['tendangnhap_dky']);
    $mk = trim($_POST['password_dky']);
    $xnmk = trim($_POST['confirmpassword_dky']);
    $getselect = $_POST['form-select15'];
    //thủ thư
   
    if (empty($tendn)) {
        $error = "<script type='text/javascript'>alert('Bạn chưa nhập tên đăng nhập!');</script>";
    } elseif (empty($mk)) {
        $error = "<script type='text/javascript'>alert('Bạn chưa nhập mật khẩu!');</script>";
    } elseif (empty($xnmk)) {
        $error = "<script type='text/javascript'>alert('Bạn chưa nhập xác nhận mật khẩu!');</script>";
    } elseif ($mk != $xnmk) {
        $error = "<script type='text/javascript'>alert('Xác nhận mật khẩu không giống nhau!');</script>";
    } else {
        if(isset($getselect) and $getselect == '1') {
          $sql = "SELECT * FROM docgia WHERE madg = '$tendn' ";
          $ress = mysqli_query($conn,$sql);
          if (mysqli_num_rows($ress) > 0) {
            $error = "<script type='text/javascript'>alert('Tên đăng nhập đã tổn tại!');</script>";
          } else {
            $sql_insert = "INSERT INTO `docgia`( `madg`, `matkhau`, `status`, `role`) VALUES ('$tendn','$mk','0','1')";
            if(mysqli_query($conn, $sql_insert)) {
              $error = "<script type='text/javascript'>alert('Đăng ký thành công!');</script>";
            } else {
              $error = "Lỗi: ".mysqli_error();
            }

          }
        } else {
          $sql_tt = "SELECT * FROM thuthu WHERE macb = '$tendn' ";
          $ress_tt = mysqli_query($conn,$sql_tt);
          if (mysqli_num_rows($ress_tt) > 0) {
            $error = "<script type='text/javascript'>alert('Tên đăng nhập đã tổn tại!');</script>";
          } else {
            $sql_insert_tt = "INSERT INTO `thuthu`( `macb`, `matkhau`, `status`) VALUES ('$tendn','$mk','0')";
            if(mysqli_query($conn, $sql_insert_tt)) {
              $error = "<script type='text/javascript'>alert('Đăng ký thành công!');</script>";
              
            } else {
              $error = "Lỗi: ".mysqli_error();
            }
          }
        }
    } 
}
?>

