<?php

include 'db.php';

$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $cpasswordErr = $numberErr = $genderErr = $hobbyErr = $countryErr = $messageErr = $imageErr = "";
$first_name = $last_name = $email = $pass = $cpass = $address = $phone = $gender = $hobby = $country = "";

if (isset($_POST['add'])) {
    function input_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["first_name"])) {
        $firstnameErr = "First Name is required";
    } else {
        $first_name = input_data($_POST["first_name"]);
    }

    if (empty($_POST["last_name"])) {
        $lastnameErr = "Last Name is required";
    } else {
        $last_name = input_data($_POST["last_name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);
    }

    if (empty($_POST["pass"])) {
        $passwordErr = "Password is required";
    } else {
        $pass = $_POST["pass"];
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/',$pass))
         {
            $passwordErr = "Password Minimum length of 8 character one upper case,lowercase & digit with special character...";
        }
        
    }

    if (empty($_POST["cpass"])) {
        $cpasswordErr = "Confirm Password is required";
    } else {
        $cpass = $_POST["cpass"];
        if ($pass !== $cpass) {
            $cpasswordErr = "Passwords do not match";
        }
    }

    if (empty($_POST["phone"])) {
        $numberErr = "Phone number is required";
    } else {
        $phone = input_data($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $numberErr = "Phone number must be 10 digits";
        }
    }

    if (empty($_POST["address"])) {
        $messageErr = "Address is required";
    } else {
        $address = input_data($_POST["address"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = input_data($_POST["gender"]);
    }

    if (empty($_POST['hobby'])) {
        $hobbyErr = "At least one hobby must be selected";
    } else {
        $hobby = implode(", ", $_POST['hobby']);
    }

    if (empty($_POST["country"])) {
        $countryErr = "Country is required";
    } else {
        $country = input_data($_POST["country"]);
    }

    if (!empty($_FILES["file"]["name"])) {
        $target_file = basename($_FILES["file"]["name"]);
        $upload_path = "image/" . $target_file;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
            $imageErr = "";
        } else {
            $imageErr = "Error uploading file";
        }
    } else {
        $imageErr = "Profile image is required";
    }


    if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($passwordErr) && empty($cpasswordErr) && empty($numberErr) && empty($messageErr) && empty($genderErr) && empty($hobbyErr) && empty($countryErr) && empty($imageErr)) {
        
        $sql = "INSERT INTO user (first_name, last_name, email, pass, file, address, phone, gender, hobby, country) VALUES ('$first_name', '$last_name', '$email', '$pass', '$target_file', '$address', '$phone', '$gender', '$hobby', '$country')";

        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            echo '<script language="javascript">';
            echo 'alert("Successfully inserted data"); location.href="display.php"';
            echo '</script>';
        }
    }
}