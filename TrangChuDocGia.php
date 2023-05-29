<?php 
include_once('dangnhap.php');
if (isset($_SESSION['id_dn'])) {
$madg = $_SESSION['id_dn'];
$sql_cmdg = "SELECT * FROM docgia WHERE madg='$madg' or id = '$madg' ";
$resss = mysqli_query($conn,$sql_cmdg);
while ($row=$resss->fetch_assoc()) {
    $tendn = $row['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Độc giả</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <link rel="stylesheet" href="css/tcdg.css">

    </head>

<!--##################################################################################################################################-->

    <body style="background-color: #ccccff">
<!-- header -->
        <header >
            <div>
                <h3 style="padding-top: 25px;">QUẢN LÝ THƯ VIỆN</h3>
                <h3 style="margin-top: -5px;">ĐẠI HỌC CÔNG NGHIỆP HÀ NỘI</h3>
                <div style="margin-top: -80px;margin-left: 1350px;">
                    <!-- Button trigger modal -->
                    <form action="index.php?">
                        <button onclick="return confirm('Bạn có chắc muốn thoát không?')" name="abc" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaldx" style="background-color: white; color:blue; margin-left: -20px;">
                            <img src="img\choice.png">
                            <b>Đăng xuất</b>

                        </button>
                    </form>
                </div>
                <img src="img\haui.png" alt="HAUI_img" width="6%" height="6%" style="margin-left: 10px; margin-top: -80px;">
            </div>
        </header>
<!-- body -->
        <article>
            <div class="tab">
                <?php 
                if (isset($_POST['capnhat_sdt']) or isset($_POST['luuthaydoi']) or isset($_POST['capnhat_email']) or isset($_POST['capnhat_matkhau']) or isset($_POST['luu_sdt']) or isset($_POST['sendotp']) or isset($_POST['luu_email']) or isset($_POST['luu_mk']) or isset($_POST['thanhtoannaptien']) or isset($_POST['thanhtoankhoanno']) or isset($_POST['naptien']) or isset($_POST['thoat']) or (isset($_POST['checkmkc'])and $_POST['checkmkc']=='checkmkc') or isset($_POST['checkmkm']) or isset($_POST['checkxnmk']) or isset($_GET['code']) or  isset($_GET['_'])) {
                    ?>
                    <button class="tablinks" onclick="openTrangChu(event,'dsm')" ><img src="img\contact-list.png" width="64px" height="64px"> &nbsp; <b>DANH SÁCH MƯỢN</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'tracuu')" ><img src="img\research.png" > &nbsp; <b>TRA CỨU</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'taikhoan')" id="defaultOpenTrangChu"><img src="img\user.png" > &nbsp; <b>TÀI KHOẢN</b></button> 
                    <?php
                } elseif(isset($_POST['timkiem_tcdg'])) {
                    ?>
                    <button class="tablinks" onclick="openTrangChu(event,'dsm')" ><img src="img\contact-list.png" width="64px" height="64px"> &nbsp; <b>DANH SÁCH MƯỢN</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'tracuu')" id="defaultOpenTrangChu"><img src="img\research.png" > &nbsp; <b>TRA CỨU</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'taikhoan')"><img src="img\user.png" > &nbsp; <b>TÀI KHOẢN</b></button> 
                    <?php
                } else {
                    ?>
                    <button class="tablinks" onclick="openTrangChu(event,'dsm')" id="defaultOpenTrangChu"><img src="img\contact-list.png" width="64px" height="64px"> &nbsp; <b>DANH SÁCH MƯỢN</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'tracuu')"><img src="img\research.png" > &nbsp; <b>TRA CỨU</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'taikhoan')"><img src="img\user.png" > &nbsp; <b>TÀI KHOẢN</b></button> 
                    <?php
                }
                ?>
 
            </div>
<!--tab trang chu -->
            
<!--qls-->
<!--#############################################################################################################################################-->

           
<!--danh sach muon -->
            <div id="dsm" class="tabcontent">
                <div style="margin-left: 20px; margin-top: 25px;">
                    <h5 style="color: blue; font-weight:bold;"><img src="img\help.png">&nbsp;THÔNG TIN SÁCH ĐƯỢC MƯỢN</h5>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar_dsm" style="margin-top: 30px; height: 250px;">

                        <table class="table table-bordered table-striped mb-0 table_dsm1" >
                            <?php
                                $sql_count = "SELECT * FROM danhsachmuon WHERE nm = '$tendn' ";
                                $res_count = mysqli_query($conn, $sql_count);
                                if (mysqli_num_rows($res_count) > 0) {
                                    $sql = "SELECT danhsachmuon.id, sach.tensach as tensachs, sach.tacgia, danhsachmuon.soluongmuon, sach.nxb, sach.id_sach FROM danhsachmuon INNER JOIN sach ON danhsachmuon.tensach = sach.id_sach
                                    WHERE tinhtrang = '' and nm = '$tendn' ";
                                    $rs = mysqli_query($conn, $sql); 
                                    if (mysqli_num_rows($rs) > 0) {
                                        ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên sách</th>
                                                <th scope="col">Tác giả</th>
                                                <th scope="col">Nhà xuất bản</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col" style="width: 50px;">Xóa</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $rs -> fetch_assoc()) {
                                            ?>
                                                <tr>                                         
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['tensachs']; ?></td>
                                                    <td><?php echo $row['tacgia']; ?></td>                                            
                                                    <td><?php echo $row['nxb']; ?></td>
                                                    <td><?php echo $row['soluongmuon']; ?></td>
                                                    <td><a onclick="return confirm('Bạn có chắc muốn xóa không?<?php echo $tendn;?>')" href="delete_dsm.php?id_dsm=<?php echo $row['id']; ?>&id_s=<?php echo $row['id_sach']; ?>&tendn=<?php echo $tendn;?>"  style="color:blue;">Xóa</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody> 
                                        <?php
                                    } else {
                                        $sql = "SELECT danhsachmuon.id, danhsachmuon.ngaytra, sach.tensach as tensachs, sach.tacgia, danhsachmuon.soluongmuon, sach.nxb, sach.id_sach, danhsachmuon.tinhtrang FROM danhsachmuon INNER JOIN sach ON danhsachmuon.tensach = sach.id_sach
                                        WHERE nm='$tendn' ";
                                        $rs = mysqli_query($conn, $sql); 
                                        if (mysqli_num_rows($rs) > 0) {
                                        ?>
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên sách</th>
                                                    <th scope="col">Tác giả</th>
                                                    <th scope="col">Nhà xuất bản</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Ngày trả</th>
                                                    <th scope="col">Tình trạng</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                while ($row = $rs -> fetch_assoc()) {
                                                ?>
                                                    <tr>                                         
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['tensachs']; ?></td>
                                                        <td><?php echo $row['tacgia']; ?></td>                                            
                                                        <td><?php echo $row['nxb']; ?></td>
                                                        <td><?php echo $row['soluongmuon']; ?></td>
                                                        <td><?php echo $row['ngaytra']; ?></td>
                                                        <td><?php echo $row['tinhtrang']; ?></td>
                                                       
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody> 
                                        <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên sách</th>
                                            <th scope="col">Tác giả</th>
                                            <th scope="col">Nhà xuất bản</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tình trạng</th>                                        
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <tr>                                         
                                            <td colspan="6" rowspan="2" style="text-align: center;">Danh sách mượn trống!</td>
                                        </tr>
                                    </tbody> 
                                    <?php
                                }
                            ?>

                        </table>

                    </div>
                    <div>
                        <p style="font-weight: bold; margin-top:25px;"> Tổng lượt mượn: &nbsp; 
                            <?php 
                            $sql_sl_lm = "SELECT MAX(lanmuon) as max FROM danhsachmuon";
                            $res_sl_lm = mysqli_query($conn,$sql_sl_lm);
                            while ($row =$res_sl_lm -> fetch_assoc()) {
                                $kq = $row['max'];
                                echo $kq." / 3";
                            }
                            ?> 
                        </p>
                    </div>
                    <hr style="size: 1px; background-color: #ddd; margin-top: 15px;">
                    <p style="font-size:14px; margin-left: 800px;">
                        <i>(Đọc kỹ danh sách trước khi gửi phiếu mượn)</i><br>
                        
                    </p>
                    <form method="post">
                        <p style="margin-top: -15px;">
                            <img src="img\schedule.png"> 
                            <b>Chọn số ngày trả hẹn: </b>
                            <select class="form-select_date" name="songaytra" aria-label="Default select example" style="color: black; margin-left: 5px; width: 60px;">
                                <option value="7" selected> 7 </option>
                                <option value="17"> 14 </option>
                                <option value="20"> 20 </option>
                                <option value="30"> 30 </option>
                                <option value="45"> 45 </option>
                                <option value="90"> 90 </option>
                            </select>
                            <button type="submit" name="xacnhan"  style="margin-left: 615px; margin-top: 35px;">
                                <img src="img\book.png">
                                <b> Xác nhận</b>
                            </button>
                            <?php include_once('duyetdsm.php');
                            include ('upload.php');?>


                        </p>
                    </form>
                </div>
            </div>

<!--#####################################################################################################################################-->

            <div id="tracuu" class="tabcontent">
<!-- tra cuu -->
                <form method="post">
                    <div class="timkiem">
                        <p style="color: blue; margin-top: 50px;">
                            <img src="img\searching.png"> 
                            <b>Tìm kiếm sách </b> 
                            <input type="text" name="timkiem_txt" style="margin-left: 15px;" value="<?php echo isset($_POST['timkiem_txt']) ? $_POST['timkiem_txt'] : '' ?>" placeholder=" Nhập...">
                            <input type="submit" name="timkiem_tcdg" value="Tìm kiếm" style="background-color: white; color: blue; font-weight: bold; margin-left: 20px">
                        </p>
                        <p style= "margin-top: 35px; margin-left: 40px; color: blue;">
                            Lọc theo thể loại 
                            <select class="form-select1" name="sl_tl" aria-label="Default select example" style="color: black; margin-left: 3px;">
                                <option value="" disabled selected> Tìm theo thể loại </option>
                                <?php 
                                $sql_tl = "SELECT * FROM theloai";
                                $res_tl = mysqli_query($conn, $sql_tl);
                                while ($row = $res_tl->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['id'];?>"> <?php echo $row['tentheloai']; ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </p>
                    </div>

                    <div class="table_tc">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar_tc" style="margin-top: 45px;">

                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sách</th>
                                        <th scope="col">Thể loại</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col" style="width: 150px;">Xem chi tiết sách</th>
                                        <th scope="col" style="width: 220px;">Thêm vào danh sách mượn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($_POST['timkiem_tcdg'])) {
                                            $timkiem_txt = $_POST['timkiem_txt'] ?? null;
                                            $tl = $_POST['sl_tl'] ?? null;
                                            if (empty($timkiem_txt) and $tl == null) {
                                                    
                                                echo "<script type='text/javascript'>alert('Vui lòng nhập thông tin tìm kiếm hoặc chọn thể loại sách cần tìm!');</script>";
                                                $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                                                $result_sql = mysqli_query($conn,$sql);
                                                while ($row = $result_sql->fetch_assoc()) {
                                                    include ('timkiem_sach.php');
                                                }
                                            } else {
                                                if (!empty($timkiem_txt) and $tl != null) {                                          
                                                    $sql = "
                                                        SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai 
                                                        WHERE  tensach LIKE '%$timkiem_txt%' and id_theloai = '$tl' or tentheloai LIKE '%$timkiem_txt%' and id_theloai = '$tl'
                                                        ORDER BY id_sach
                                                    ";
                                                    $result_sql = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result_sql) > 0) {
                                                        while ($row = $result_sql->fetch_assoc()) {
                                                            include ('timkiem_sach.php');
                                                        }
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                                        $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                                                        $result_sql = mysqli_query($conn,$sql);
                                                        while ($row = $result_sql->fetch_assoc()) {
                                                            include ('timkiem_sach.php');
                                                        }
                                                    }
                                                } elseif ($tl == null) {
                                                    $sql = "
                                                        SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai 
                                                        WHERE  tensach LIKE '%$timkiem_txt%' or tentheloai LIKE '%$timkiem_txt%'
                                                        ORDER BY id_sach
                                                    ";
                                                    $result_sql = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result_sql) > 0) {
                                                        while ($row = $result_sql->fetch_assoc()) {
                                                            include ('timkiem_sach.php');
                                                        }
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                                        $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                                                        $result_sql = mysqli_query($conn,$sql);
                                                        while ($row = $result_sql->fetch_assoc()) {
                                                            include ('timkiem_sach.php'); 
                                                        }
                                                    }
                                                } else {
                                                    $id_tl = $_POST['sl_tl'];
                                                    $sql = "
                                                        SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai 
                                                        WHERE  id_theloai = '$id_tl'
                                                        ORDER BY id_sach
                                                    ";
                                                    $result_sql = mysqli_query($conn,$sql);
                                                    if (mysqli_num_rows($result_sql) > 0) {
                                                        while ($row = $result_sql->fetch_assoc()) {
                                                            include ('timkiem_sach.php');
                                                        }
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('Chưa có sách thể loại này!');</script>";
                                                        $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                                                        $result_sql = mysqli_query($conn,$sql);
                                                        while ($row = $result_sql->fetch_assoc()) {
                                                            include ('timkiem_sach.php');
                                                        }
                                                    }
                                                }
                                                
                                            }
                                        } else {  
                                            $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                                            $result_sql = mysqli_query($conn,$sql);
                                            while ($row = $result_sql->fetch_assoc()) {
                                                include ('timkiem_sach.php'); 
                                            }
                                            
                                        }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </form>        
            </div>

<!--#####################################################################################################################################-->
        <?php 
        include('taikhoan_func.php'); 
        
        ?>

        </article>

<!--######################################################################################################################-->

        <footer style="margin-top: -30px; background-color: #ccccff; width: 100%; height: 220px;" >

            <img src="img\footer.jpg" style="width: 100%; height: 220px; margin-top: 5px;">
            <div class="footer-" style="margin-top: -210px; margin-left: 200px;">
                <a href="TrangChuDocGia.php?id_dn=<?php echo $tendn; ?>"><img src="img\haui.png" width="50px" height="50px"></a>
                <div style="margin-left:100px; margin-top: -50px;">
                    <h6 style="color: white;"> Bản đồ chỉ dẫn</h6>
                    <p style="color: white; font-size: 14px; margin-top: -8px;">Trường đại học Công nghiệp Hà Nội</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14893.89515186498!2d105.735107!3d21.053731!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2sus!4v1663757595386!5m2!1svi!2sus" width="250px" height="100px" style="border:0; margin-top: -15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div style="color: white; margin-left: 300px; margin-top: -165px"> 
                        <h6>Trụ sở chính</h6>
                        <p style="font-size: 14px;">
                            Số 298 đường Cầu Diễn, quận Bắc Từ Liêm, Hà Nội <br> 
                            +84 243 765 5121 <br>
                            Email: dhcnhn@haui.edu.vn
                        </p>
                        <h6>Các cơ sở khác</h6>
                        <p style="font-size:14px;">
                            Cơ sở 2: Phường Tây Tựu, Bắc Từ Liêm, Hà Nội <br> 
                            Cơ sở 3: Lê Hồng Phong, TP. Phủ Lý, Hà Nam
                        </p>
                        <div style="margin-left: 400px; margin-top: -210px;">
                            <h6>Liên kết site</h6>
                            <p style="font-size: 14px;">
                                <a href="https://www.haui.edu.vn/vn">Trường Đại học Công nghiệp Hà Nội</a><br>
                                <a href="https://tuyensinh.haui.edu.vn/">Cổng thông tin tuyển sinh</a> <br>
                                <a href="#">Hành chính điện tử</a> <br>
                                <a href="https://egov.haui.edu.vn/core/Home/LogOn/?ReturnUrl=%2fcore">Đào tạo trực tuyến</a> <br>
                                <a href="https://tuyensinh.haui.edu.vn/">Cổng thông tin đào tạo</a> <br><br>
                                <a href="https://m.facebook.com/106126414891476/"><img src="https://www.haui.edu.vn/dnn/web/haui/assets/images/svg/facebook.svg" width="32px" height="32px"></a>
                                <a href="https://m.youtube.com/c/HaUITV" style="margin-left:10px;"><img src="https://www.haui.edu.vn/dnn/web/haui/assets/images/svg/youtube.svg" width="32px" height="32px"></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <section style="width: 100%; height:28px; background-color: #083970; color: white; font-size:16px; margin-top: 5px; text-align: center;">
             Copyright © 2021 <a href="#" style="color: white;">Đại Học Công Nghiệp Hà Nội</a>
        </section>
        <script>
//tab trang chu
            function openTrangChu(evt, funcName) {
                var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(funcName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpenTrangChu").click();

        </script>

        
    </body>
</html>

<?php 
    } //while
} //if
?>