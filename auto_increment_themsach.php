<?php 
include_once('conn.php');
    $query = mysqli_query($conn,"SELECT * FROM sach");
        $number = 1;
        while($row = mysqli_fetch_array($query)) {
            $id = $row['id_sach'];
            $sql = "UPDATE sach SET id_sach=$number WHERE id_sach=$id";
            $conn->query($sql);
            $number++;

        }

        $sql = "ALTER TABLE sach AUTO_INCREMENT = 1";
        $conn->query($sql);

?>