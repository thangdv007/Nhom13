<tr>
    <th scope="row"><?php echo $row['id_sach']; ?></th>                                       
    <td><?php echo $row['tensach']; ?></td>
    <td><?php echo $row['tentheloai']; ?></td>
    <td><?php echo $row['soluongcon']; ?></td>
    <td > 
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModala<?php echo $row['id_sach']; ?>" style="color: blue; padding: 0px; height: 0px; width: 100px; border: 0px; font-size: 12px; margin-top: -15px; margin-left: 5px;">
            Chi tiết
        </button>

        <?php include 'model_xemchitietsach.php'; ?>
    </td>
    <td style="text-align: center;"><a style="color: blue;" href="themvaodsm.php?id_s=<?php echo $row['id_sach']; ?>&tendn=<?php echo $tendn;?>" > Thêm </a> </td>
</tr>
