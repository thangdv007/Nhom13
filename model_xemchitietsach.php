<form method="post">
  <div id="myModala<?php echo $row['id_sach']; ?>" class="modal fade" role="dialog" style="margin-top: -20px;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <div class="col-md-12 text-center">
          <input type="hidden" name="id_s" value="<?php echo $row['id_sach']; ?>">
          <input type="hidden" name="id_dn" value="<?php echo $tendn; ?>">
          <h5 class="view-title text-uppercase" style="color: blue; font-weight: bold;"><?php echo $row['tensach']; ?></h5>
        </div> 

        <div>
          <table style="background-color: white; font-size: 16px; border: 0px;">
            <tr style="background-color: white; font-size: 16px; border: 0px;">
              <td style="border: 0px;">Tác giả:</td>
              <td style="border: 0px; font-weight: bold;"><?php echo $row['tacgia']; ?></td>
            </tr>

            <tr style="background-color: white; font-size: 16px; border: 0px;">
              <td style="border: 0px;">Nhà xuất bản:</td>
              <td style="border: 0px; font-weight: bold;"><?php echo $row['nxb']; ?></td>
            </tr>

            <tr style="background-color: white; font-size: 16px; border: 0px;">
              <td style="border: 0px;">Thể loại:</td>
              <td style="border: 0px; font-weight: bold;"><?php echo $row['tentheloai']; ?></td>
            </tr>

            <tr style="background-color: white; font-size: 16px; border: 0px;">
              <td style="border: 0px;">Nội dung:</td>
              <td style="border: 0px; font-weight: bold;">
                <?php 
                if ($row['tomtatnoidung']=='') {
                  echo "Trống!";
                } else { 
                  echo $row['tomtatnoidung']; 
                } 
                ?>  
              </td>
            </tr>
          </table>
          <?php
          $img = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
          $id_s = $row['id_sach'];
          foreach ($img as $id) {
             if($id == $id_s) {
              ?><img src='img_book\<?php echo $id; ?>.png' style="margin-left: 80px; width: 300px;"><?php
             }
          } 
          ?>
        </div>
      </div>
      <div class="modal-footer" style="padding: 10px; padding-bottom: 0px;">
        <div class="row mb-3 align-items-center">

          <div class="col-md-7 text-end" style="margin-left: -10px;">
            <button type="submit" name="themvaodsm" class="btn btn-primary">
              Thêm vào danh sách mượn
            </button>
            <?php include_once 'themvaodsm_xemcts.php'; ?>
          </div>

          <div class="col-md-2 text-end" style="margin-left: 35px;">
            <button type="button" class="btn btn-primary btn-default" data-dismiss="modal">
              Thoát
            </button>
          </div>

        </div>  
      </div>

    </div>
  </div>
</div>
</form>