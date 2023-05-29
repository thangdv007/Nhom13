 <?php
include_once('conn.php');
session_start();
if(isset($_POST['dangnhap'])) {
    $tendn = trim($_POST['tendangnhap']);
    $_SESSION['id_dn'] = $tendn;
    $id_dn = $_SESSION['id_dn'];
    $mk = trim($_POST['password']);
    $getselect = $_POST['form-select'];
    
    //thủ thư
    $sql = "SELECT * FROM thuthu WHERE macb='$tendn' AND matkhau='$mk' AND status=0";
    $query_run = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM thuthu WHERE macb='$tendn' AND matkhau='$mk' AND status=1";
    $query_run1 = mysqli_query($conn, $sql1);
    //đọc giả
    $sql_dg = "SELECT * FROM docgia WHERE madg='$tendn' AND matkhau='$mk' AND status=0 ";
    $query_run_dg = mysqli_query($conn, $sql_dg);
    $sql_dg_khoa = "SELECT * FROM docgia WHERE madg='$tendn' AND matkhau='$mk' AND status=1";
    $query_run_dg_k = mysqli_query($conn, $sql_dg_khoa);

    if (empty($tendn)) {
        $error = "<script type='text/javascript'>alert('Tên đăng nhập trống!');</script>";
    } elseif (empty($mk)) {
        $error = "<script type='text/javascript'>alert('Mật khẩu trống!');</script>";
    } elseif (isset($getselect) and $getselect == '1') {
        if ( mysqli_num_rows($query_run_dg) > 0 ) {
            echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php'; </script>";
        } elseif ( mysqli_num_rows($query_run_dg_k) > 0 ) {
            $error = "<script type='text/javascript'>alert('Tài khoản của bạn đã bị khóa!');</script>";
        } else {
            $error = "<script type='text/javascript'>alert('Sai tài khoản hoặc mật khẩu!');</script>";
        }
    }
    else {
        if ( mysqli_num_rows($query_run) > 0 ) {
            echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
        } elseif ( mysqli_num_rows($query_run1) > 0 ) {
            $error = "<script type='text/javascript'>alert('Tài khoản của bạn đã bị khóa!');</script>";
        } else {
            $error = "<script type='text/javascript'>alert('Sai tài khoản hoặc mật khẩu!');</script>";
        }
    } 
}
?>

