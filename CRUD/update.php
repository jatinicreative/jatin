<?php
include 'db.php';

$first_name = $last_name = $email = $address = $phone = $id ="";
$firstnameErr = $lastnameErr = $emailErr = $messageErr = $numberErr = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $hobby = implode(", ", $_POST['hobby']);
    $country = $_POST['country'];
    
    $first_name = trim($_POST['first_name']);
    if(empty($first_name)) {
        $firstnameErr = 'First name required';
    }

    $last_name = trim($_POST['last_name']);
    if(empty($last_name)) {
        $lastnameErr = 'Last name required';
    }

    $email = trim($_POST['email']);
    if(empty($email)) {
        $emailErr = 'Emmail is required';
    }

    $address = trim($_POST['address']);
    if(empty($address)) {
        $messageErr = 'Address is required';
    }

    if (empty($_POST["phone"])) {
        $numberErr = "Phone number is required";
    } else {
        $phone = $_POST["phone"];
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $numberErr = "Phone number must be 10 digits";
        }
    }


    if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($messageErr) && empty($numberErr) )  {
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
}