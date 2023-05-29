<tr>
    <th scope='row'> <?php echo $row['id_sach']; ?> </th>
    <td> <?php echo $row['tensach']; ?> </td>
    <td> <?php echo $row['tentheloai']; ?> </td>
    <td> <?php echo $row['tacgia']; ?> </td>
    <td> <?php echo $row['nxb']; ?> </td>
    <td> <?php echo $row['soluongcon']; ?> </td>
    <td > 
        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' style='background-color: none; color: blue; font-size: 14px; border: 0px; height: 0px; width: 0px; padding: 0px; margin-top: -20px; margin-left: 15px;' >
            <b>Mượn sách</b>
        </button>

        <!-- Modal -->
        <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document' style='width: 1000px; margin-left: 250px; margin-top: 150px;'>
                <div class='modal-content' style='width: 900px;'>
                    <div class='modal-header'></div>

                    <div class='modal-body' style='background-color: rgb(255, 255, 204); height:350px'>
                        <div>
                            <img src='img\learning.png' style='margin-top:20px; margin-left: 80px;'>
                            <hr style='width: 1px; height: 350px; background-color: #ddd; margin-top: -297px; text-align: center;'>
                            <div style='margin-left:475px; margin-top: -335px;'>
                                <form action='' method='post' id='f_qldg' name='f_qldg'>
                                    <div style='margin-top: 0px; margin-left: 115px;'>
                                        <h4 ><b>Đăng nhập</b></h4>
                                    </div>
                                    <p style='margin-top: 25px;'>
                                        Chức vụ: 
                                        <select class='form-select' name='form-select' aria-label='Default select example' style='color: black; margin-left: 70px; height: 35px; width: 120px;'>
                                            <option value='1'> Độc giả </option>
                                            <option value='2'> Thủ thư </option>
                                        </select>                                              
                                    </p>
                                    <p>Tên đăng nhập: &nbsp; <input type='text' name='tendangnhap' style='width: 180px;' required></p>
                                    <p>Mật khẩu: <input type='password' name='password' id='password' style='width: 180px; margin-left: 63px;' minlength='3' required></p>
                                    <div>
                                        <input type='submit' style='margin-left: 65px; font-weight: bold; background-color: white;' value='Đăng nhập'>
                                        <button type='button' data-dismiss='modal' style='margin-left: 15px;'><b>Thoát</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'></div>
                </div>
            </div>
        </div>
    </td>
</tr>