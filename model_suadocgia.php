<?php
include_once('sua_docgia.php');?>
<form method="post">
  <div class="modal fade" id="exampleModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 15px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -10px; color:blue;"><b>Sửa độc giả</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; ">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 18px; text-align: left; margin-left: 27px;">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
      
        <div>
          Mã độc giả:
            <input type="text" name="model_madg" style="margin-left: 35px;" value="<?php echo $row['madg']; ?>"  required> 
        </div>
        <div>
          Mật khẩu: 
          <input type="text" name="modal_mk" style="margin-left: 45px; margin-top:10px;" value="<?php echo $row['matkhau']; ?>" required>
        </div>

        <div>
          Tên độc giả: 
          <input type="text" name="modal_tendg" style="margin-left: 33px; margin-top:10px;" value="<?php echo $row['tendg']; ?>" required>
        </div>

        <div style="margin-top:10px;">
          Giới tính:
          <?php
          if ($row['gioitinh'] == "Nam") {
            echo "<input type='radio' id='nam1' name='gioitinh1' value='Nam' checked style='margin-left: 55px;'>
          <label for='nam1'> &nbsp;Nam &nbsp;</label>
          <input type='radio' id='nu1' name='gioitinh1' value='Nữ' >
          <label for='nu1'> &nbsp;Nữ &nbsp;</label>
          <input type='radio' id='khac1' name='gioitinh1' value='Khác'>
          <label for='khac1'> &nbsp;Khác </label><br>";
          } elseif ($row['gioitinh'] == "Nữ"){
            echo "<input type='radio' id='nam1' name='gioitinh1' value='Nam'  style='margin-left: 55px;'>
          <label for='nam1'> &nbsp;Nam &nbsp;</label>
          <input type='radio' id='nu1' name='gioitinh1' value='Nữ' checked>
          <label for='nu1'> &nbsp;Nữ &nbsp;</label>
          <input type='radio' id='khac1' name='gioitinh1' value='Khác'>
          <label for='khac1'> &nbsp;Khác </label><br>";
          }else {
            echo "<input type='radio' id='nam1' name='gioitinh1' value='Nam'  style='margin-left: 55px;'>
          <label for='nam1'> &nbsp;Nam &nbsp;</label>
          <input type='radio' id='nu1' name='gioitinh1' value='Nữ' >
          <label for='nu1'> &nbsp;Nữ &nbsp;</label>
          <input type='radio' id='khac1' name='gioitinh1' value='Khác' checked>
          <label for='khac1'> &nbsp;Khác </label><br>";
          }
          ?>
        </div>

        <div>
          Số điện thoại: 
          <input type="number" name="modal_sdt" style="margin-left: 20px;" value="<?php echo $row['sdt']; ?>" required>
        </div>

        <div>
          Ngày sinh: 
          <input type="date" name="modal_ngaysinh" min="1999-01-01" max="2022-12-31" style="margin-left: 45px; margin-top:10px;" value="<?php echo $row['ngaysinh']; ?>" required>
        </div>

        <div>
          Địa chỉ: 
          <input type="text" name="modal_dc" style="margin-left: 70px; margin-top:10px;" value="<?php echo $row['diachi']; ?>" required>
        </div>

        <div>
          Email: 
          <input type="Email" name="modal_email" style="margin-left: 77px; margin-top:10px;" value="<?php echo $row['email']; ?>" required>
        </div>

        <div style="margin-top: 10px;">
          Role: 
          <?php
          if ($row['role']=="0") {
          ?>
          <select name="role" style="margin-left: 85px; width: 100px; height: 35px;">
            <option value="0" selected>Admin</option>
            <option value="1">User</option>
          </select>
          <?php
          } else {
          ?>
          <select name="role" style="margin-left: 85px; width: 100px; height: 35px;">
            <option value="0" >Admin</option>
            <option value="1" selected>User</option>
          </select>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       <form method="get">
          <input type="submit" name="save" value="save" style="background-color: #2196f3; color: white; height: 45px; width: 70px; border-radius: 5px; border: 0px; font-size:20px;">
       </form>
      </div>
    </div>
  </div>
</div>
</form>
