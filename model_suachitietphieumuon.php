<?php
include_once('sua_phieumuon.php');?>
<form method="post">
  	<div class="modal fade" id="t<?php echo $row['id']; ?>">
  		<div class="modal-dialog">
    		<div class="modal-content">

      			<div class="modal-header" style="padding-bottom: 15px;">
			        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -10px; color:blue;"><b>Sửa phiếu mượn</b></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; ">
			          	<span aria-hidden="true">&times;</span>
			        </button>
      			</div>

      			<div class="modal-body" style="font-size: 18px; text-align: left; margin-left: 27px;">
			        <input type="hidden" name="id_pm" value="<?php echo $row['id']; ?>"/>

			        <div style="margin-top: 5px;">
			          	Mã phiếu mượn:
			            <input type="text" name="model_mapm" style="margin-left: 20px;" value="<?php echo $row['mapm']; ?>"  required readonly> 
			        </div>

			        <div style=" margin-top: 10px;">
			          	Mã độc giả 
			          	<input type="text" name="modal_madg" style="margin-left: 65px;" value="<?php echo $row['madg']; ?>" required>
			        </div>

			        <div style=" margin-top: 10px;">
			          	Tên sách: 
			          	<input type="text" name="modal_masach" style="margin-left: 73px;" value="<?php echo $row['tensach']; ?>" required>
			        </div>

			        <div style=" margin-top: 10px;">
			          	Số lượng mượn: 
			          	<input type="number" name="modal_solg" style="margin-left: 20px;" value="<?php echo $row['soluongmuon']; ?>" required>
			        </div>

			        <div style=" margin-top: 10px;">
			          	Ngày trả: 
			          	<input type="text" name="modal_tg" style="margin-left: 80px;" value="<?php echo $row['ngaytra']; ?>" required>
			        </div>

			        <div style=" margin-top: 10px;">
			          	Tình trạng: 
			          	<?php
			          	if (trim($row['tinhtrang']) == "Đã trả") {
			          		echo "
				          		<select id='mySelect' name='tinhtrang' style='margin-top: -60px; margin-left: 66px; width: 227px; height: 30px;'>
							        <option value='Đã trả' style='color: black;' selected> Đã trả </option>
							        <option value='Chưa trả' style='color: black;'> Chưa trả </option>
							        <option value='Mất sách' style='color: black;'> Mất sách </option>
							        <option value='Hư hỏng' style='color: black;'> Hư hỏng </option>
							    </select>
						    ";
			          	} elseif (trim($row['tinhtrang']) == "Chưa trả") {
			          		echo "
				          		<select id='mySelect' name='tinhtrang' style='margin-top: -60px; margin-left: 66px; width: 227px; height: 30px;'>
							        <option value='Đã trả' style='color: black;'> Đã trả </option>
							        <option value='Chưa trả' style='color: black;' selected> Chưa trả </option>
							        <option value='Mất sách' style='color: black;'> Mất sách </option>
							        <option value='Hư hỏng' style='color: black;'> Hư hỏng </option>
							    </select>
						    ";
					    
			          	} elseif (trim($row['tinhtrang']) == "Mất sách") {
			          		echo "
				          		<select id='mySelect' name='tinhtrang' style='margin-top: -60px; margin-left: 66px; width: 227px; height: 30px;'>
							        <option value='Đã trả' style='color: black;'> Đã trả </option>
							        <option value='Chưa trả' style='color: black;'> Chưa trả </option>
							        <option value='Mất sách' style='color: black;' selected> Mất sách </option>
							        <option value='Hư hỏng' style='color: black;'> Hư hỏng </option>
							    </select>
						    ";
			          	} else {
			          		echo "
				          		<select id='mySelect' name='tinhtrang' style='margin-top: -60px; margin-left: 66px; width: 227px; height: 30px;'>
							        <option value='Đã trả' style='color: black;'> Đã trả </option>
							        <option value='Chưa trả' style='color: black;'> Chưa trả </option>
							        <option value='Mất sách' style='color: black;'> Mất sách </option>
							        <option value='Hư hỏng' style='color: black;' selected> Hư hỏng </option>
							    </select>
						    ";
			          	}
			          	?>
			        </div>

			        <div style=" margin-top: 10px;">
			          	Cán bộ: 
			          	<input type="text" name="modal_cb" style="margin-left: 88px;" value="<?php echo $row['tencb']; ?>" required>
			        </div>

			        <div style=" margin-top: 10px;">
			          	Nội dung: 
			          	<input type="text" name="modal_nd" style="margin-left: 73px;" value="<?php echo $row['noidung'] ?? null; ?>">
			        </div>
      			</div>

      			<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			       	<form method="get">
			          	<input type="submit" name="save_suapm" value="save" style="background-color: #2196f3; color: white; height: 45px; width: 70px; border-radius: 5px; border: 0px; font-size:20px;">
			       	</form>
      			</div>

    		</div>
  		</div>
	</div>
</form>
