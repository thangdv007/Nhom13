<tr>
    <th scope="row"> <?php echo $row['id']; ?> </th>
    <td> <?php echo $row['matheloai']; ?> </td>
    <td> <?php echo $row['tentheloai']; ?> </td>
    <td style="text-align: center;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#c<?php echo $row['id'];?>" style="width: 0px; height: 0px; padding: 0px; border: 0px; ">
            <img src="img\caneta.png" width='20' height='20' style="margin-left: -10px; margin-top: -30px;">
        </button>
        <?php include 'model_suatheloai.php'; ?>
    </td>
    <td style="text-align: center;">
        <form method="get">
            <a onclick="return confirm('Bạn có chắc muốn xóa thể loại này không?')" href="delete_theloai.php?idtl=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>">
                <img src="img\xoa.png" style="height: 20px; width: 20px;">
            </a>
        </form>
    </td>
</tr>