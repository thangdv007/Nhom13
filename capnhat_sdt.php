<h5 style="color: blue; margin-top: 20px; margin-left: 30px;"> <b>Cập nhật số điện thoại</b> </h5>
<form method="post">
    <div style="
        width: 400px;
        padding: 16px;
        border: 1px solid black;
        box-sizing: border-box;
        border-radius: 4px;
        margin-top: 30px;
        margin-left: 360px;
        ">
        <?php
        include_once('conn.php');
        if (isset($tendn)) {
            $sqlsdt = "SELECT * FROM docgia WHERE id='$tendn' ";
            $res_sdt = mysqli_query($conn, $sqlsdt);
            while ($row = $res_sdt->fetch_assoc()) {
                 $sdt = $row['sdt'];
        ?>
        <label>Số điện thoại</label>
        <input type="number" name="sdt" value="<?php echo $sdt; ?>" placeholder="Nhập số điện..." style="width: 366px; border-radius: 4px; background-image:url('img/phone_.png'); background-size: 24px;background-repeat:no-repeat; background-position: 10px;  padding-left:45px; -moz-appearance: textfield;">
        <input type="submit" name="luu_sdt" value="Lưu thay đổi" style="width: 366px; height: 37px; margin-top: 30px; background-color: #0B74E5; color: white; border: 0px; border-radius: 4px;">

        <?php
            } 
        } 
        ?>
    </div>
    <button type="submit" name="thoat" style="color: blue; border-radius: 4px; border: 1px solid blue; margin-left: 1000px; margin-top: 300px; width: 80px; height: 40px;">Thoát</button>
</form>


