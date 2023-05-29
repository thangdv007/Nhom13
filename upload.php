<?php
include_once ('conn.php');
if(isset($_POST['luuthaydoi'])) {
    $upload_img = $_FILES['upload_img']['tmp_name'];
    $dest_path = 'img/'.$_FILES['upload_img']['name']; 
    $file_name = basename($_FILES['upload_img']['name']);
    $tendn = $_POST['id_dn'];
    $tendg = $_POST['tendg'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $diachi = $_POST['diachi'];
    $img = $_POST['img'];
    if(move_uploaded_file($upload_img,$dest_path)){
        $sql = "UPDATE `docgia` SET `tendg`='$tendg',`ngaysinh`='$ngaysinh',`gioitinh`='$gioitinh',`diachi`='$diachi', `img`='$file_name' WHERE id = '$tendn' ";
        $conn->query($sql);
        echo "<script type='text/javascript'>alert('Thành công!');</script>";
        
    }else{
        $sql = "UPDATE `docgia` SET `tendg`='$tendg',`ngaysinh`='$ngaysinh',`gioitinh`='$gioitinh',`diachi`='$diachi' WHERE id = '$tendn' ";
        $conn->query($sql);
        echo "<script type='text/javascript'>alert('Thành công!');</script>";
       
    }
} 
?>