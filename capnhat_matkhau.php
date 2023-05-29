<h5 style="color: blue; margin-top: 20px; margin-left: 30px;"> <b>Cập nhật mật khẩu</b> </h5>
<form method="post">
    <div style="
        width: 400px;
        padding: 16px;
        border: 1px solid black;
        box-sizing: border-box;
        border-radius: 4px;
        margin-top: 30px;
        margin-left: 360px;
        background-color: #êf;
        ">
        <?php
        include_once('conn.php');
        if (isset($tendn)) {
            $sqlsdt = "SELECT * FROM docgia WHERE id='$tendn' ";
            $res_sdt = mysqli_query($conn, $sqlsdt);
            while ($row = $res_sdt->fetch_assoc()) {
                 $sdt = $row['sdt'];
        ?>
        <div>
            <label style="margin-bottom: 5px;">Mật khẩu hiện tại</label>
            <input type="password" name="matkhaucu" id="password" value="<?php echo isset($_POST['matkhaucu']) ? $_POST['matkhaucu'] : '' ?>" placeholder="Nhập mật khẩu hiện tại..." style="width: 366px; border-radius: 4px; padding-left: 10px;">
            <div class="" style="margin-top: -33px; width: 0px;">
                <i class="bi bi-eye-slash" id="togglePassword" style="width: 24px; height: 24px; margin-top: -69px; margin-left: 333px;"></i>
            </div>
        </div> 

        <div style="margin-top: 30px;">
            <label style="margin-bottom: 5px;">Mật khẩu mới</label>
            <input type="password" name="matkhaumoi" id="passwordm" value="<?php echo isset($_POST['matkhaumoi']) ? $_POST['matkhaumoi'] : '' ?>" placeholder="Nhập mật khẩu mới..." style="width: 366px; border-radius: 4px; padding-left: 10px;">
            <div style="margin-top: -33px; width: 0px;">
                <i class="bi bi-eye-slash" id="togglePasswordm" style="width: 24px; height: 24px; margin-top: -69px; margin-left: 333px;"></i>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <label style="margin-bottom: 5px;">Nhập lại mật khẩu mới</label>
            <input type="password" name="xacnhanmatkhau" id="passwordx" value="<?php echo isset($_POST['xacnhanmatkhau']) ? $_POST['xacnhanmatkhau'] : '' ?>" placeholder="Nhập lại mật khẩu mới..." style="width: 366px; border-radius: 4px; padding-left: 10px; ">
            <div style="margin-top: -33px; width: 0px;">
                <i class="bi bi-eye-slash" id="togglePasswordx" style="width: 24px; height: 24px; margin-top: -69px; margin-left: 333px;"></i>
            </div>
        </div>

        <div style="margin-top: 0px;"><label style="font-size: 14px;">* Mật khẩu phải dài từ 3 đến 20 ký tự</label></div>

        <input type="submit" name="luu_mk" value="Lưu thay đổi" style="width: 366px; height: 37px; margin-top: 30px; background-color: #0B74E5; color: white; border: 0px; border-radius: 4px;">

        <?php
            } 
        } 
        ?>
    </div>
    <button type="submit" name="thoat" style="color: blue; border-radius: 4px; border: 1px solid blue; margin-left: 1000px; margin-top: 60px; width: 80px; height: 40px;">Thoát</button>
</form>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);    
        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    const togglePasswordm = document.querySelector("#togglePasswordm");
    const passwordm = document.querySelector("#passwordm");

    togglePasswordm.addEventListener("click", function () {
        // toggle the type attribute
        const type = passwordm.getAttribute("type") === "password" ? "text" : "password";
        passwordm.setAttribute("type", type);    
        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    const togglePasswordx = document.querySelector("#togglePasswordx");
    const passwordx = document.querySelector("#passwordx");

    togglePasswordx.addEventListener("click", function () {
        // toggle the type attribute
        const type = passwordx.getAttribute("type") === "password" ? "text" : "password";
        passwordx.setAttribute("type", type);    
        // toggle the icon
        this.classList.toggle("bi-eye");
    });
</script>