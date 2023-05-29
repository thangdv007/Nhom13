<?php
if(isset($_POST['luuthaydoi'])) {
    $upload_img = $_FILES['upload_img']['name'];
    echo "<script type='text/javascript'>alert('$upload_img');</script>";
    $dest_path = 'img/'.$_FILES['upload_img']['name']; 

    if(move_uploaded_file($upload_img,$dest_path)){ //this will move the file from tmp   location in server to the destination you provide in the second parameter

    

    }else{

     echo "Image could not be uploaded";

    }
} 
?>