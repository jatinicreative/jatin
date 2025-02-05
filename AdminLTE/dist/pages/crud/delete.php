<?php 

    include '../db.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql ="DELETE from user WHERE id = $id";
        $conn->query($sql);

        header("Location: display.php");
    }
