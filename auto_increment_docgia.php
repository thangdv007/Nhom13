<?php
include_once('conn.php');
    $query = mysqli_query($conn,"SELECT * FROM docgia");
        $number = 1;
        while($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $sql = "UPDATE docgia SET id=$number WHERE id=$id";
            $conn->query($sql);
            $number++;

        }

        $sql = "ALTER TABLE docgia AUTO_INCREMENT = 1";
        $conn->query($sql);

?>