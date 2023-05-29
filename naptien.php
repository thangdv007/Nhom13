<h5 style="color: blue; margin-top: 20px; margin-left: 30px;"> <b>Nạp tiền vào tài khoản</b> </h5>
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
                 $email = $row['email'];
        ?>
        <div class="selector">
            <input type="text" name="nganhang" id="selectText1" style="visibility: hidden;">
            <label style="margin: 0px; margin-left: -265px;">Ngân hàng</label>

            <div id="selectField">
                <p id="selectText">Chọn ngân hàng</p>
                <img src="img/arrow.png">
            </div>

            <img src="img/bank.png" id="img_bank" style="width: 24px; height:24px; margin-top: -70px; margin-left: 10px;">

            <ul id="list" class="hide">
                <li class="options">
                    <img src="img/momo.png">
                    <p>MoMo</p>
                </li>

                <li class="options">
                    <img src="img/zalopay.png">
                    <p>ZaloPay</p>
                </li>

                <li class="options">
                    <img src="img/viettelpay.png">
                    <p>Viettel Money</p>
                </li>

                <li class="options">
                    <img src="img/vietcombank.png">
                    <p>Vietcombank</p>
                </li>

                <li class="options">
                    <img src="img/techcombank.png">
                    <p>Techcombank</p>
                </li>

                <li class="options">
                    <img src="img/viettinbank.png">
                    <p>Viettinbank</p>
                </li>

                <li class="options">
                    <img src="img/bidv.png">
                    <p>BIDV</p>
                </li>

                <li class="options">
                    <img src="img/agribank.png">
                    <p>Agribank</p>
                </li>
            </ul>
        </div>
        
        <div class="hide1" id="list1">
            <div style="margin-top: -330px;">
                <label style="margin: 0px;" >Số điện thoại</label>
                <input type="number" name="sdt_naptien" value="<?php echo $sdt; ?>" placeholder="Nhập số điện thoại..." style="width: 366px; border-radius: 4px; background-image:url('img/phone_.png'); background-size: 24px;background-repeat:no-repeat; background-position: 10px;  padding-left:45px;">
            </div>

            <div style="margin-top: 15px;" class="hide1">
                <label style="margin: 0px;">Số tiền</label>
                <input type="text" name="sotien_naptien" id="selectTien" value="<?php echo isset($_POST['sotien_naptien'])? $_POST['sotien_naptien'] : '' ?>" placeholder="Nhập số tiền..." style="width: 366px; border-radius: 4px; background-image:url('img/money.png'); background-size: 24px;background-repeat:no-repeat; background-position: 10px;  padding-left:45px;">
                 <ul id="list2">
                    <li class="options2">100000</li>

                    <li class="options2">200000</li>

                    <li class="options2">500000</li>
                </ul>
            </div>

            <div class="g-recaptcha" data-sitekey="6Lfls3wiAAAAANeLyp9Yn1hXvP8F_9RHHX1QWMXw"></div>
            
            <div>
                 <input type="submit" name="thanhtoannaptien" value="Thanh toán" style="width: 366px; height: 37px; margin-top: 30px; background-color: #0B74E5; color: white; border: 0px; border-radius: 4px;">
            </div>
        </div>

        <?php
            } 
        } 
        ?>
    </div>
    <button type="submit" name="thoat" style="color: blue; border-radius: 4px; border: 1px solid blue; margin-left: 1000px; margin-top: 10px; width: 80px; height: 40px;">Thoát</button>
</form>

<script>
    var selectField = document.getElementById('selectField');
    var selectText = document.getElementById('selectText');
    var options = document.getElementsByClassName('options');
    var list = document.getElementById('list');
    var list1 = document.getElementById('list1');

    selectField.onclick = function() {
        list.classList.toggle("hide");
        list1.style.visibility = 'hidden';
    }

    for (option of options) {
        option.onclick = function() {
            selectText1.value = this.textContent;
            selectText.innerHTML = this.textContent;
            list.classList.toggle("hide");
            list1.style.visibility = 'visible';

            if (this.textContent.trim()=='Vietcombank') {
                document.getElementById('img_bank').src = "img/vietcombank.png";
            } else if (this.textContent.trim()=='Viettel Money') {
                document.getElementById('img_bank').src = "img/viettelpay.png";
            }else if (this.textContent.trim()=='Techcombank') {
                document.getElementById('img_bank').src = "img/techcombank.png";
            }else if (this.textContent.trim()=='Viettinbank') {
                document.getElementById('img_bank').src = "img/viettinbank.png";
            }else if (this.textContent.trim()=='Agribank') {
                document.getElementById('img_bank').src = "img/agribank.png";
            }else if (this.textContent.trim()=='MoMo') {
                document.getElementById('img_bank').src = "img/momo.png";
            }else if (this.textContent.trim()=='ZaloPay') {
                document.getElementById('img_bank').src = "img/zalopay.png";
            }else if (this.textContent.trim()=='BIDV') {
                document.getElementById('img_bank').src = "img/bidv.png";
            } else {
                document.getElementById('img_bank').src = "img/bank.png";
            }

            
        }
    }

    var selectTien = document.getElementById('selectTien');
    var options2 = document.getElementsByClassName('options2');
   
    let dollarUSLocale = Intl.NumberFormat('en-US');
    let dollarIndianLocale = Intl.NumberFormat('en-IN');

    for (option of options2) {
        option.onclick = function() {
            var content = dollarUSLocale.format(this.textContent);
            selectTien.value = content;
        }
    }

    
</script>