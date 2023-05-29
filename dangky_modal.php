<form method="post">
  <div class="modal fade" id="dky" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 900px;  margin-top: 150px; margin-left:300px;">
    <div class="modal-dialog" role="document" style="width: 900px;">
      <div class="modal-content" style="width: 900px; margin-left: -200px; margin-top: -35px;">

        <div class="modal-header" style="padding: 0px;">
          <button type="button" data-dismiss="modal" style="margin-left: 865px; border: 0px; width: 50px;">
            <span aria-hidden="true" style="font-size:25px;">&times;</span>
          </button>
        </div>

        <div class="modal-body" style="background-color: rgb(255, 255, 204); height:350px">
          <div>
            <div style="margin-top:0px; margin-left: 30px;">
              <form action="" method="post">
                <div style="margin-top: 0px; margin-left: 115px;">
                  <h4 ><b>Đăng ký</b></h4>
                </div>
                <p style="margin-top: 10px;">
                  Chức vụ: 
                  <select class="form-select" name="form-select15" aria-label="Default select example" style="color: black; margin-left: 73px; height: 35px; width: 120px;">
                    <option value="1"> Độc giả </option>
                    <option value="2"> Thủ thư </option>
                  </select>                                              
                </p>
                <p style="margin-top: -10px;">Tên đăng nhập: &nbsp; <input type="text" name="tendangnhap_dky" style="width: 180px; margin-left: 10px;" value="<?php echo isset($_POST['tendangnhap_dky']) ? $_POST['tendangnhap_dky'] : ''?>"></p>
                <p style="margin-top: -10px;">Mật khẩu: <input type="password" name="password_dky" id="password_dky" style="width: 180px; margin-left: 60px;" minlength="3" value="<?php echo isset($_POST['password_dky']) ? $_POST['password_dky'] : ''?>" ></p>
                <p style="margin-top: -10px;">Xác nhận: <input type="password" name="confirmpassword_dky" id="confirmpassword_dky" style="width: 180px; margin-left: 65px;" minlength="3" value="<?php echo isset($_POST['confirmpassword_dky']) ? $_POST['confirmpassword_dky'] : ''?>" ></p>
                <div >
                  <button type="submit" name="dangky" style="margin-left: 85px; font-weight: bold; border-radius: 5px; margin-top: 3px;">
                    Đăng ký
                  </button>
                  <?php include_once('dangky.php'); ?>
                  <button type="button" data-dismiss="modal" style="margin-left: 20px; border-radius: 5px; font-weight: bold;">
                    Đăng nhập
                  </button>
                </div>
              </form>
            </div>

            <hr style="width: 1px; height: 350px; background-color: #ddd; margin-top: -294px; text-align: center; padding: 0px; margin-bottom: 0px;">
            <img src="img\learning.png" style="margin-left:525px; margin-top: -399px;">  
          </div>
        </div>

      </div>
    </div>
  </div>
</form>