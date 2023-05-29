<?php
include_once('sua_theloai.php');?>
<form method="post">
  <div class="modal fade" id="c<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 15px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -10px; color:blue;"><b>Sửa độc giả</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; ">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 18px; text-align: left; margin-left: 27px;">
        <input type="hidden" name="id_tl" value="<?php echo $row['id'];?>"/>
        <div>
          Thể loại:
            <input type="text" name="modal_ttl" style="margin-left: 45px;" value="<?php echo $row['tentheloai']; ?>"  required> 
        </div>
        <div>
          Mã thể loại: 
          <input type="text" name="modal_mtl" style="margin-left: 20px; margin-top:10px;" value="<?php echo $row['matheloai']; ?>" required>
        </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       <form method="get">
          <input type="submit" name="save_suatl" value="save" style="background-color: #2196f3; color: white; height: 45px; width: 70px; border-radius: 5px; border: 0px; font-size:20px;">
       </form>
      </div>
    </div>
  </div>
</div>
</form>
