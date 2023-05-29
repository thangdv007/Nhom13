<?php 
include_once('dangnhap.php');
include_once('themvaodsm.php');
include_once('conn.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang chủ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/view.css">
        

    </head>
    <body style="background-color: #ccccff" >
        <header >
            <div class="container-md">
                <div class="view " >
                <h3 style="padding-top: 25px;">QUẢN LÝ THƯ VIỆN</h3>
                <h3 style="margin-top: -5px;">ĐẠI HỌC CÔNG NGHIỆP HÀ NỘI</h3>
                <div style="margin-top: -80px;margin-left: 1320px;">
<!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: white; color:blue;">
                        <img src="img\choice.png">
                        <b>Đăng nhập</b>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="width: 1000px; margin-left: 300px; margin-top: 150px;">
                            <div class="modal-content" style="width: 900px;">
                                <div class="modal-header" style="padding: 0px;">
                                    <button type="button" data-dismiss="modal" style="margin-left: 865px; border: 0px; width: 50px;">
                                        <span aria-hidden="true" style="font-size:25px;">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" style="background-color: rgb(255, 255, 204); height:350px">
                                    <div>
                                        <img src="img\learning.png" style="margin-top:20px; margin-left: 80px;">
                                        <hr style="width: 1px; height: 350px; background-color: #ddd; margin-top: -297px; text-align: center;">
                                        <div style="margin-left:475px; margin-top: -335px;">
                                            <form method="post" id="f_qldg" name="f_qldg">
                                                <div style="margin-top: 0px; margin-left: 115px;">
                                                    <h4 ><b>Đăng nhập</b></h4>
                                                </div>
                                                <p style="margin-top: 25px;">
                                                    Chức vụ: 
                                                        <select class="form-select" name="form-select" aria-label="Default select example" style="color: black; margin-left: 75px; height: 35px; width: 120px;">
                                                            <option value="1"> Độc giả </option>
                                                            <option value="2"> Thủ thư </option>
                                                        </select>                                              
                                                </p>
                                                <p>Tên đăng nhập: &nbsp; <input type="text" name="tendangnhap" style="width: 180px;  margin-left: 15px;"  value="<?php echo isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : ''?>" ></p>
                                                <p>Mật khẩu: <input type="password" name="password" id="password" style="width: 180px; margin-left: 63px;" minlength="3" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>" ></p>
                                                <div>
                                                    <button type="submit" name="dangnhap" style="margin-left: 65px; font-weight: bold; background-color: white; border-radius: 5px; margin-top:5px;">Đăng nhập
                                                    </button>

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dky" style="margin-left: 15px; font-weight: bold; height: 37px; background-color: white; color: black; border: 2px solid black; padding:0px 10px 0px 10px; margin-top: -3px;">
                                                        Đăng ký
                                                    </button>
                                                    
                                                </div>
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="img\haui.png" alt="HAUI_img" width="6%" height="6%" style="margin-left: 10px; margin-top: -80px;">
            </div>
            </div>
            <?php include_once('dangky_modal.php'); ?>
        </header>

        <article>
            <div class="tab">
                <?php
                if(isset($_POST['timkiem_sach'])) {
                    ?>
                    <button class="tablinks" onclick="openTrangChu(event,'qldg')" ><img src="img\home.png" width="64px" height="64px"> &nbsp; <b>TRANG CHỦ</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'hddn')"><img src="img\tutorial.png" > &nbsp; <b>HƯỚNG DẪN ĐĂNG NHẬP</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'tracuu')" id="defaultOpenTrangChu"><img src="img\research.png"> &nbsp; <b>TRA CỨU SÁCH</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'hinhanhtv')"><img src="img\books.png"> &nbsp; <b>HÌNH ẢNH THƯ VIỆN</b></button> 
                    <?php
                } else {
                    ?>
                    <button class="tablinks" onclick="openTrangChu(event,'qldg')" id="defaultOpenTrangChu"><img src="img\home.png" width="64px" height="64px"> &nbsp; <b>TRANG CHỦ</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'hddn')"><img src="img\tutorial.png" > &nbsp; <b>HƯỚNG DẪN ĐĂNG NHẬP</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'tracuu')"><img src="img\research.png"> &nbsp; <b>TRA CỨU SÁCH</b></button>
                    <button class="tablinks" onclick="openTrangChu(event,'hinhanhtv')"><img src="img\books.png"> &nbsp; <b>HÌNH ẢNH THƯ VIỆN</b></button> 
                    <?php
                }
                ?>
            </div>
<!--tab trang chu -->
            <div id="qldg" class="tabcontent">
                <p style="margin-top: 20px;"> 
                    ** Phần mềm quản lý thư viện – trường Đại Công nghiệp Hà Nội (ĐHCNHN-HaUI) có nhiệm vụ đáp ứng nhu cầu thông tin phục vụ công tác học tập,giảng dạy và nghiên cứu khoa học cho cán bộ, giảng viên, sinh viên và các nhà nghiên cứu của Đại học Đà Nẵng. Hệ thống thư viện được phát triển trên phần mềm công nghệ hiện đại của thế giới với Mục lục thư mục chung. <br><br>
                
                    ** Mục lục chung của hệ thống thư viện cung cấp nguồn tài nguyên thông tin với hơn 200.000 nhan đề / 800.000 tài liệu bản in (bao gồm sách, ấn phẩm nhiều kỳ, luận văn, luận án, báo cáo khoa học và các tài liệu bản in khác), các cơ sở dữ liệu, tài liệu số và tài liệu điện tử hiện có tại ĐHCNHN. <br><br>
                
                    &emsp;Bên cạnh đó, mạng mục lục (UD – ALNET) còn kết nối tìm kiếm đến một cơ sở dữ liệu xuất bản trực tuyến, tích hợp trên quy mô lớn chỉ mục trong môi trường điện toán đám mây, bao phủ hàng trăm triệu tài nguyên điện tử toàn văn như các bài báo, tạp chí khoa học, sách điện tử, kỷ yếu hội nghị khoa học, báo cáo kỹ thuật, luận văn… được thu hoạch từ các nhà xuất bản, từ kho số truy cập mở trực tuyến của hàng trăm trường đại học trên thế giới. <br><br>
                
                    ** Mục lục thư viện chung này cho phép người dùng tìm kiếm tất cả các tài liệu sẵn có từ nhiều thư viện khác nhau trong hệ thống trên cùng một giao diện thông qua một hộp tìm kiếm duy nhất (OneSearch). <br><br>
                
                    Hộp tìm kiếm duy nhất (OneSearch) sẽ là một công cụ tuyệt vời để bạn tìm kiếm tài nguyên học tập, giảng dạy và nghiên cứu nếu bạn muốn: <br>
                    - Tìm kiếm một nhan đề tài liệu bản in cụ thể, bất kể đó là sách hay một bài báo nghiên cứu sẵn có. <br>
                    - Tìm kiếm kết hợp cả sách, bài báo, tài liệu số, cơ sở dữ liệu … theo một chủ đề nào đó hoặc đơn giản là bạn khởi đầu cho một nghiên cứu. <br><br>

                    &emsp;Hệ thống quản lý thư viện Trường Đại học Công nghiệp Hà Nội hy vọng sẽ làm hài long quý Bạn đọc!<?php if(isset($error)) echo $error; ?>

                </p>

            </div>
      
<!--qls-->
            <div id="hddn" class="tabcontent">
                <h5 style="color: rgb(153,0, 0); text-align: center; margin-top: 50px;"><img src="img\help.png">Bạn đang gặp khó khăn khi đăng nhập?</h5>
                <div style="margin-left: 80px; margin-top: 50px;">
                        <p>Bước 1: Chọn nút Đăng nhập bên góc phải màn hình.</p>
                        Bước 2: Nhập thông tin đăng nhập:
                        <p style="margin-left: 30px;">
                            - Nếu bạn là Sinh viên, giản viên muốn tìm kiếm sách hãy đăng nhập với quyền Độc giả để bắt đầu tra cứu và mượn sách nhé!<br>
                            - Nếu bạn là cán bộ quản lý thư viện hãy đăng nhập với quyền Thủ thứ để tiến hành quản lý hệ thống.
                        </p>
                        Bước 3: Ấn nút Đăng nhập và bắt đầu trải nghiệm nào!
                </div>
                <hr style="size: 1px; background-color: black; margin-top: 180px;">
                <p style="color: rgb(153, 0, 0); font-size: 14.5; margin-left: 35px; margin-top: 10px;">
                    <img src="img\navigator.png">&nbsp; Hệ thống phần mềm Quản lý thư viện <br>
                    <img src="img\telephone.png">&nbsp; Liên hệ: 0899.999.999 - Địa chỉ: Từ Liêm, TP.Hà Nội
                </p>
                <p style="color: rgb(153, 0, 0); font-size: 14.5; margin-left: 750px; margin-top: -80px">
                    <img src="img\light-bulb.png">&nbsp; Thiết kế bởi: Nhóm 13
                </p>
            </div>
	    
<!--quan ly muon tra-->
            <div id="hinhanhtv" class="tabcontent">
                <div class="table-img-index">
                    <table class="table-img-index-thuvien">
                        <tr>
                            <td><img src="img\tv1.jpg"></td>
                            <td><img src="img\tv3.jpg"></td>
                            <td><img src="img\tv4.jpg"></td>
                        </tr>
                        <tr>
                            <td><div class="title-img">Tổng quan về thư viện</div></td>
                            <td><div class="title-img">Trung tâm thông tin thư viện</div></td>
                            <td><div class="title-img">Quy tắc thư viện</div></td>
                        </tr>
                        <tr>
                            <td><img src="img\tv5.jpg"></td>
                            <td><img src="img\tv.jpg"></td>
                            <td><img src="img\tv2.jpg"></td>
                        </tr>
                        <tr>
                            <td><div class="title-img">Sinh viện đang đọc sách</div></td>
                            <td><div class="title-img">Sinh viên tra cứu và đọc sách</div></td>
                            <td><div class="title-img">Sinh viên đang thảo luận</div></td>
                        </tr>
                    </table>
                </div>
                <div style="margin-top: -139px;">
                    <hr style="size: 1px; background-color: black; margin-top: 180px;">
                    <p style="color: rgb(153, 0, 0); font-size: 14.5; margin-left: 35px; margin-top: 10px;">
                        <img src="img\navigator.png">&nbsp; Hệ thống phần mềm Quản lý thư viện <br>
                        <img src="img\telephone.png">&nbsp; Liên hệ: 0899.999.999 - Địa chỉ: Từ Liêm, TP.Hà Nội
                    </p>
                    <p style="color: rgb(153, 0, 0); font-size: 14.5; margin-left: 750px; margin-top: -80px">
                        <img src="img\light-bulb.png">&nbsp; Thiết kế bởi: Nhóm 13
                    </p>
                </div>
            </div>

            <div id="tracuu" class="tabcontent">
<!-- tra cuu -->
                <div class="timkiem">
                    <form method="post">
                        <p style="color: blue; margin-top: 50px;">
                            <img src="img\searching.png"> 
                            <b>Tìm kiếm sách </b> 
                            <input type="text" name="timkiem" style="margin-left: 15px;" placeholder=" Nhập...">
                            <input type="submit" name="timkiem_sach" value="Tìm kiếm" style="background-color: white; color: blue; font-weight: bold; margin-left: 20px;">
                        </p>
                        <p style= "margin-top: 35px; margin-left: 40px; color: blue;">
                            Lọc theo thể loại 
                            <select class="form-select_tl" name="form-select_tl" aria-label="Default select example" style="color: black; margin-left: 3px;">
                                <option value="" disabled selected> Tìm theo thể loại </option>
                                <option value="1"> Giáo trình học </option>
                                <option value="2"> Sách tham khảo </option>
                                <option value="3"> Văn hóa lịch sử </option>
                                <option value="4"> Chính trị, Pháp luật </option>
                                <option value="5"> Tạp chí </option>
                            </select>
                        </p>
                    </form>
                </div>
                <div class="table_tc" >
                    <div class="table-wrapper-scroll-y my-custom-scrollbar_tc" style="margin-top: 45px;">

                        <table class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên sách</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Tác giả</th>
                                    <th scope="col">Nhà xuất bản</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thêm vào dsm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (isset($_POST['timkiem_sach'])) {
                                        $txt_timkiem = $_POST['timkiem'];
                                        $tl = $_POST['form-select_tl'] ?? null;
                                        if ($txt_timkiem !='' and $tl!=null) {
                                            $sql1 = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id WHERE tensach LIKE '%$txt_timkiem%' and id_theloai LIKE '%$tl%' or tacgia LIKE '%$txt_timkiem%' and id_theloai LIKE '%$tl%' or nxb LIKE '%$txt_timkiem%' and id_theloai LIKE '%$tl%' ORDER BY id_sach";
                                            $query_tk = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query_tk) > 0 ) {
                                                while ($row = $query_tk->fetch_assoc()) {
                                                    require 'timkiemsach_index.php';
                                                }
                                            } else {
                                                
                                                $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    require 'timkiemsach_index.php';
                                                }
                                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                            }

                                        } elseif($txt_timkiem !='') {
                                            $sql1 = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id WHERE tensach LIKE '%$txt_timkiem%' or tacgia LIKE '%$txt_timkiem%' or nxb LIKE '%$txt_timkiem%' ORDER BY id_sach";
                                            $query_tk = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query_tk) > 0 ) {
                                                while ($row = $query_tk->fetch_assoc()) {
                                                    require 'timkiemsach_index.php';
                                                }
                                            } else {
                                                
                                                $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    require 'timkiemsach_index.php';
                                                }
                                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                            }

                                        } elseif($tl!=null) {
                                            $sql1 = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id WHERE id_theloai LIKE '%$tl%' or  id_theloai LIKE '%$tl%' or id_theloai LIKE '%$tl%' ORDER BY id_sach";
                                            $query_tk = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query_tk) > 0 ) {
                                                while ($row = $query_tk->fetch_assoc()) {
                                                    require 'timkiemsach_index.php';
                                                }
                                            } else {
                                                
                                                $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    require 'timkiemsach_index.php';
                                                }
                                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                            }
                                        } else {
                                            $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                require 'timkiemsach_index.php';
                                            }
                                            echo "<script type='text/javascript'>alert('Bạn chưa nhập thông tin tìm kiếm!');</script>";
                                        }
                                    } else {
                                        $sql_sl_sach = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                        $result_r = mysqli_query($conn,$sql_sl_sach);
                                        while ($row=$result_r->fetch_assoc()) {
                                            require 'timkiemsach_index.php';
                                        }
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>        
            </div>
        </article>
        
        <footer style="margin-top: -30px; background-color: #ccccff; width: 100%; height: 220px;" >

            <img src="img\footer.jpg" style="width: 100%; height: 220px; margin-top: 5px;">
            <div class="footer-" style="margin-top: -210px; margin-left: 200px;">
                <a href="index.php"><img src="img\haui.png" width="50px" height="50px"></a>
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

