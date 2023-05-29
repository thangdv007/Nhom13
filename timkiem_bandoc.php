<tr>
    <th scope='row'><?php echo $row['id']; ?></th>
    <td><?php echo $row['madg']; ?></td>
    <td><?php echo $row['tendg']; ?></td>
    <td><?php echo $row['gioitinh']; ?></td>
    <td><?php echo $row['diachi']; ?></td>
    <td><?php echo $row['ngaysinh']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td>
        <?php 
        if($row['role'] == 0) {
            echo "Thủ thư";
        } else {
            echo "Độc giả";
        }
        ?>
                                            
    </td>
    <td>
        <button type="button" id="tk_bd" class="btn btn-success" data-toggle="modal" data-target="#a<?php echo $row['id']; ?>" style="width: 0px; height: 0px; padding: 0px; border: 0px; "><img src="img\caneta.png" width='20' height='20' style="margin-left: 5px; margin-top: -30px;"></button>
        <?php include 'model_tk_suadocgia.php'; ?>
    </td>
      
    <td style='text-align: center;'>
        <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="delete_docgia.php?iddg=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>"><img src='img\xoa.png' width='20' height='20'></a>
    </td>
    <td style='text-align: center;'>
        <a onclick="return confirm('Bạn có chắc muốn khóa tài khoản này không?')" href="khoa_docgia.php?iddg=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>"><img src='img\block.png' width='20' height='20'></a>
    </td>
    <td style='text-align: center;'>
        <a onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này không?')" href="mokhoa_docgia.php?iddg=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>"><img src='img\man.png' width='20' height='20'></a>
    </td>
</tr>
