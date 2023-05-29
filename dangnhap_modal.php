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
                        
                        <form action="" method="post" id="f_qldg" name="f_qldg">
                            <div style="margin-top: 0px; margin-left: 115px;">
                                <h4 ><b>Đăng nhập</b></h4>
                            </div>
                            <p style="margin-top: 25px;">
                                Chức vụ: 
                                    <select class="form-select" name="form-select" aria-label="Default select example" style="color: black; margin-left: 70px; height: 35px; width: 120px;">
                                        <option value="1"> Độc giả </option>
                                        <option value="2"> Thủ thư </option>
                                    </select>                                              
                            </p>

                            <p>Tên đăng nhập: &nbsp; <input type="text" name="tendangnhap" style="width: 180px;" value="<?php echo isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : ''?> " required>
                            </p>

                            <p>Mật khẩu: <input type="password" name="password" id="password" style="width: 180px; margin-left: 63px;" minlength="3" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>" required>
                            </p>

                            <div>
                                <input type="submit" name="dangnhap" style="margin-left: 65px; font-weight: bold; background-color: white; border-radius: 5px; " value="Đăng nhập">
                               
                                </button>
                                
                                   
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dky" style="margin-left: 15px; font-weight: bold; height: 37px; background-color: white; color: black; border: 2px solid black; padding:0px 10px 0px 10px;">
                                    Đăng ký
                                </button>
                                <?php include_once('dangky.php'); ?>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>

            <div class="modal-footer"></div>
        </div>
    </div>
</div>