<?php
include 'ofunction.php';
$insertdata = new CRUD();

$errors = [];
$first_name = $last_name = $email = $pass = $cpass = $address = $phone = $gender = $hobby = $country = "";
$file_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['oadd'])) {

    $first_name = trim($_POST['first_name']);
    if (empty($first_name)) {
        $errors['first_name'] = "First Name is required.";
    }

    $last_name = trim($_POST['last_name']);
    if (empty($last_name)) {
        $errors['last_name'] = "Last Name is required.";
    }

    $email = trim($_POST['email']);
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid Email is required.";
    }

    $pass = trim($_POST['pass']);
    $cpass = trim($_POST['cpass']);
    if (empty($pass)) {
        $errors['pass'] = "Password is required.";
    } elseif ($pass !== $cpass) {
        $errors['cpass'] = "Passwords do not match.";
    }

    $address = trim($_POST['address']);
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    }

    $phone = trim($_POST['phone']);
    if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) {
        $errors['phone'] = "Valid 10-digit Phone Number is required.";
    }

    $gender = $_POST['gender'] ?? "";
    if (empty($gender)) {
        $errors['gender'] = "Gender is required.";
    }

    $hobby = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : "";
    if (empty($hobby)) {
        $errors['hobby'] = "At least one Hobby is required.";
    }

    $country = $_POST['country'] ?? "";
    if (empty($country)) {
        $errors['country'] = "Country is required.";
    }


    if (!empty($_FILES["file"]["name"])) {
        $file_name = basename($_FILES["file"]["name"]);
        $upload_path = "image/" . $file_name;
        $file_type = strtolower(pathinfo($upload_path, PATHINFO_EXTENSION));

        if (!in_array($file_type, ['jpg', 'jpeg', 'png'])) {
            $errors['file'] = "Only JPG, JPEG, and PNG files are allowed.";
        } elseif (!move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
            $errors['file'] = "Failed to upload the image.";
        }
    } else {
        $errors['file'] = "Profile Image is required.";
    }


    if (empty($errors)) {
        $sql = $insertdata->insert($first_name, $last_name, $email, $pass, $file_name, $address, $phone, $gender, $hobby, $country);
        if ($sql) {
            echo "<script>alert('Record inserted successfully');</script>";
            echo "<script>window.location.href='odisplay.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}