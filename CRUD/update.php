<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = implode(", ", $_POST['hobby']);
    $country = $_POST['country'];


    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
        $file = $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];
        $folder = "./image/" . $file;

        if ($_FILES["file"]["error"] > 0) {
            die("Error uploading file: " . $_FILES["file"]["error"]);
        }

        if ($_FILES['file']['size'] == 0) {
            die("File is empty.");
        }

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_extensions)) {
            die("Only JPG, JPEG, and PNG files are allowed.");
        }

        if (!move_uploaded_file($tempname, $folder)) {
            die("Failed to move the uploaded file.");
        }

   
        $sql = "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', file='$file', address='$address', phone='$phone', gender='$gender', hobby='$hobby', country='$country' WHERE id='$id'";
    } else {
      
        $sql = "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', address='$address', phone='$phone', gender='$gender', hobby='$hobby', country='$country' WHERE id='$id'";
    }

    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successfully Data Updated"); location.href="display.php"';
        echo '</script>';
    }
}