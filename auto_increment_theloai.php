<?php 
include_once('conn.php');
    $query = mysqli_query($conn,"SELECT * FROM theloai");
        $number = 1;
        while($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $sql = "UPDATE theloai SET id=$number WHERE id=$id";
            $conn->query($sql);
            $number++;

        }

        $sql = "ALTER TABLE theloai AUTO_INCREMENT = 1";
        $conn->query($sql);

?>