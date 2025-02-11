<?php include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql ="DELETE from user WHERE id = $id";
    mysqli_query($conn,$sql);

    header("Location: display.php");
}