<tr>
    <th scope="row"><?php echo $row['id']; ?></th>
    <td><?php echo $row['tendg']; ?></td>
    <td><?php echo $row['tensach']; ?></td>
    <td><?php echo $row['tentheloai']; ?></td>
    <td><?php echo $row['soluongmuon']; ?></td>
    <td><?php echo $row['ngaytra']; ?></td>
    <td>
        <?php
        if ($row['tinhtrang']=='Chờ xét duyệt') {
            echo $row['tinhtrang']; ?> <a onclick="return confirm('Bạn chắc chắn muốn duyệt độc giả này chứ?')" href='duyet_pm.php?id_ttt=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>&ngaytra=<?php echo $row['ngaytra']; ?>' style='color: blue;'>Duyệt</a> <?php
        } else {
            echo $row['tinhtrang'];
        }
        include_once('duyet_pm.php');
        ?>

    </td>
    <td><?php echo $row['tencb'] ?? null; ?></td>
    <td><?php echo $row['noidung']; ?></td>
    <td style="text-align: center;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#t<?php echo $row['id']; ?>" style="width: 0px; height: 0px; padding: 0px; border: 0px; "><img src="img\caneta.png" width='20' height='20' style="margin-left: -10px; margin-top: -30px;"></button>

        <?php include 'model_suachitietphieumuon.php'; ?>
    </td>
    <td style="text-align: center;">
        <a onclick="return confirm('Bạn có chắc muốn xóa phiếu mượn này không?')" href="delete_pm.php?idpm=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>"><img src="img\xoa.png" width="17" height="17"></a>
    </td>
</tr>