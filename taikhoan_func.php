<form method="post" enctype="multipart/form-data">
    <div id="taikhoan" class="tabcontent"> 
        <?php
        if(isset($_POST['capnhat_sdt'])) {
            include ('capnhat_sdt.php');
        } elseif(isset($_POST['capnhat_email'])) {
            include ('capnhat_email.php');
        } elseif(isset($_POST['capnhat_matkhau'])) {
            include ('capnhat_matkhau.php');
        } elseif(isset($_POST['naptien'])) {
            include ('naptien.php');
        } else {
            if (isset($_POST['luu_sdt'])) {
                $sdt = $_POST['sdt'];
                if (strlen((string)$sdt) < 10) {
                    echo "<script type='text/javascript'>alert('Số điện thoại không hợp lệ!');</script>";
                    include ('capnhat_sdt.php');
                } else {
                    $sql_ud_sdt = "UPDATE docgia SET sdt='$sdt' WHERE id='$tendn' ";
                    if(mysqli_query($conn, $sql_ud_sdt)) {
                        echo "<script type='text/javascript'>alert('Thành công!');</script>";
                        include ('taikhoan.php');
                    } else {
                        echo "<script type='text/javascript'>alert('Lỗi :".mysqli_error()."');</script>";
                        include ('taikhoan.php');
                    }
                }
            } elseif (isset($_POST['sendotp'])) {
                $email = trim($_POST['email']);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    include ('send_otp.php');
                 } else {
                    echo "<script type='text/javascript'>alert('Email không đúng định dạng!');</script>";
                    include ('capnhat_email.php');
                }

            } elseif(isset($_POST['luu_email'])) {
                $otp = $_POST['otp'];
                $otpcf = $_POST['otpcf'];
                $email_ = $_POST['email_'];
                if ($otp == $otpcf) {
                    $sql_ud_sdt = "UPDATE docgia SET email='$email_' WHERE id='$tendn' ";
                    if(mysqli_query($conn, $sql_ud_sdt)) {
                        echo "<script type='text/javascript'>alert('Thành công!');</script>";
                        include ('taikhoan.php');
                    } else {
                        echo "<script type='text/javascript'>alert('Lỗi :".mysqli_error()."');</script>";
                        include ('taikhoan.php');
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Mã OTP không đúng!');</script>";
                    include ('verify_email.php');  
                }
            } elseif (isset($_POST['luu_mk'])) {
                $mkc = trim($_POST['matkhaucu']);
                $mk = trim($_POST['matkhaumoi']);
                $xnmk = trim($_POST['xacnhanmatkhau']);
                $check_mkc = "SELECT * FROM docgia WHERE id='$tendn' and matkhau='$mkc' ";
                $res_check_mkc = mysqli_query($conn, $check_mkc);
                if (mysqli_num_rows($res_check_mkc) > 0) {
                    if (empty($mkc) or empty($mk) or empty($xnmk)) {
                        echo "<script type='text/javascript'>alert('Không được để trống!');</script>";
                        include ('capnhat_matkhau.php');
                    } elseif (strlen((string)$mk) < 3) {
                        echo "<script type='text/javascript'>alert('Mật khẩu mới phải dài hơn 3 ký tự!');</script>";
                        include ('capnhat_matkhau.php');
                    } elseif ($mk != $xnmk) {
                        echo "<script type='text/javascript'>alert('Xác nhận mật khẩu không đúng!');</script>";
                        include ('capnhat_matkhau.php');
                    } else {
                        $sql_ud_sdt = "UPDATE docgia SET matkhau='$mk' WHERE id='$tendn' ";
                        if(mysqli_query($conn, $sql_ud_sdt)) {
                            echo "<script type='text/javascript'>alert('Thành công!');</script>";
                            include ('taikhoan.php');
                        } else {
                            echo "<script type='text/javascript'>alert('Lỗi :".mysqli_error()."');</script>";
                            include ('taikhoan.php');
                        }
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Mật khẩu hiện tại không đúng!');</script>";
                    include ('capnhat_matkhau.php');
                }
            } elseif (isset($_POST['thanhtoannaptien'])) {
                $sotien = str_replace(",", "", $_POST['sotien_naptien']);
                $sdt = trim($_POST['sdt_naptien']);
                $nh = trim($_POST['nganhang']);

                $secretKey = "6Lfls3wiAAAAAPtY_NPqERojPRMzpUo73M8sXMoY";
                $responseKey = $_POST['g-recaptcha-response'];
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&reomteip=$userIP";

                $response = file_get_contents($url);
                $response = json_decode($response);

                if($nh =="") {
                    echo "<script type='text/javascript'>alert('Bạn chưa chọn ngân hàng?');</script>";
                    include ('naptien.php');
                } else {
                    $sql_check_sdt = "SELECT * FROM docgia WHERE id='$tendn' and sdt='$sdt' ";
                    $res_check_sdt = mysqli_query($conn, $sql_check_sdt);
                    if(mysqli_num_rows($res_check_sdt) > 0) {
                        if ($response->success) {
                            $up_ = "UPDATE docgia SET sodu=sodu+'$sotien' WHERE id='$tendn' ";
                            $conn->query($up_);
                            echo "<script type='text/javascript'>alert('Thanh toán thành công!');</script>";
                            include ('taikhoan.php');
                        } else {
                            echo "<script type='text/javascript'>alert('Bạn chưa chọn captcha!');</script>";
                            include ('naptien.php');
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('Số điện thoại không đúng?');</script>";
                        include ('naptien.php');
                    }
                }
            } elseif (isset($_POST['thanhtoankhoanno'])) {
                $thanhtoankn = "SELECT * FROM docgia WHERE id='$tendn' ";
                $res_ttkn = mysqli_query($conn, $thanhtoankn);
                while ($row=$res_ttkn -> fetch_assoc()) {
                    $sodu = $row['sodu'];
                    $kn = $row['khoanno'];
                    $tt = $sodu - $kn;
                    if ($tt >= 0) {
                        $sql_ud = "UPDATE docgia SET sodu = '$tt', khoanno='0' WHERE id = '$tendn' ";
                        if(mysqli_query($conn, $sql_ud)) {
                            echo "<script type='text/javascript'>alert('Thanh toán thành công!');</script>";
                            include ('taikhoan.php');
                        } else {
                            echo "<script type='text/javascript'>alert('Lỗi :".mysqli_error()."');</script>";
                            include ('taikhoan.php');
                        }
                    } else {
                        $ttm = -$tt;
                        $sql_ud = "UPDATE docgia SET sodu = '0', khoanno='$ttm' WHERE id = '$tendn' ";
                        if(mysqli_query($conn, $sql_ud)) {
                            echo "<script type='text/javascript'>alert('Thanh toán thành công!');</script>";
                            include ('taikhoan.php');
                        } else {
                            echo "<script type='text/javascript'>alert('Lỗi :".mysqli_error()."');</script>";
                            include ('taikhoan.php');
                        }
                    }
                }
            } else {
                include ('taikhoan.php');
            }
            
        }
        ?>

    </div>
</form>