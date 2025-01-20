<?php
include 'db.php';

if (isset($_POST['add'])) {
   
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $cpass = $_POST['cpass'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $hobby = implode(", ", $_POST['hobby']) ?? '';
    $country = $_POST['country'] ?? '';

    $target_file = basename($_FILES["file"]["name"]);
    $upload_path = "images/".$target_file;

    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }
    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($pass)) {
        $errors[] = "Password is required.";
    } elseif (strlen($pass) < 5) {
        $errors[] = "Password must be at least 5 characters long.";
    }
    if (empty($cpass)) {
        $errors[] = "Confirm password is required.";
    } elseif ($pass !== $cpass) {
        $errors[] = "Password and confirm password do not match.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (empty($hobby)) {
        $errors[] = "At least one hobby must be selected.";
    }
    if (empty($country)) {
        $errors[] = "Country is required.";
    }
    
    
    if (!empty($errors)) {
        echo "<script>alert('" . implode("\\n", $errors) . "'); </script>";
        echo '<script>location.href="form.php"</script>';
    } else {

    if (move_uploaded_file($_FILES["file"]["tmp_name"],$upload_path))
    {
        $sql = "INSERT INTO user (first_name, last_name, email, pass, file, address, phone, gender, hobby, country) 
        VALUES ('$first_name','$last_name','$email','$pass','$target_file','$address','$phone','$gender','$hobby','$country')";


    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successfully Data Inserted"); location.href="index.php"';
        echo '</script>';
    }    
        }
        
    }
 
} 

