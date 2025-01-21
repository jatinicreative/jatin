<?php
include 'db.php';
$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $cpasswordErr = $numberErr = $genderErr = $hobbyErr = $countryErr = $messageErr = $imageErr = "";
$first_name = $last_name = $email = $pass = $cpass = $address = $phone  = $gender = $hobby = $country  = "";
if (isset($_POST['add'])) {

    if (empty($_POST["first_name"])) {
        $firstnameErr = "First Name is required";
    } else {
        $first_name = input_data($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
            $firstnameErr = "Only letters and white space are allowed";
        }
    }
    if (empty($_POST["last_name"])) {
        $lastnameErr = "Last Name is required";
    } else {
        $last_name = input_data($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
            $lastnameErr = "Only letters and white space are allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["pass"])) {
        $passwordErr = "Password is required";
    } else {
        $pass = input_data($_POST["pass"]);
        if (!preg_match("/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/", $password)) {
           $passwordErr = "Password must be between 8 and 12 characters and contain letters, numbers, and special characters";
        }
    }

    if (empty($_POST["cpass"])) {
        $cpasswordErr = "Confirm Password is required";
    } else {
        $cpass = input_data($_POST["cpass"]);
        if ($pass !== $cpass) {
            $cpasswordErr = "Passwords do not match";
        }
    }

    if (empty($_POST["phone"])) {
        $numberErr = "Phone Number is required";
    } else {
        $phone = input_data($_POST["phone"]);
        if (!preg_match("/^[0-9]*$/", $phone)) {
            $numberErr = "Only numeric value is allowed.";
        } elseif (strlen($phone) != 10) {
            $numberErr = "Mobile no must contain 10 digits.";
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
        $hobby = implode(",", $_POST['hobby']);
    }

    if (empty($_POST["country"])) {
        $countryErr = "Country is required";
    } else {  
        $country = input_data($_POST["country"]);
    }

    if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($passwordErr) && empty($cpasswordErr) && empty($numberErr) && empty($messageErr) && empty($genderErr) && empty($hobbyErr) && empty($countryErr) && empty($imageErr)) 
    {
        $target_file = basename($_FILES["file"]["name"]);
        $upload_path = "images/".$target_file;
    
    
        if (move_uploaded_file($_FILES["file"]["tmp_name"],$upload_path))
        {
        $sql = "INSERT INTO user (first_name, last_name, email, pass, file, address, phone, gender, hobby, country) 
        VALUES ('$first_name','$last_name','$email','$pass','$target_file','$address','$phone','$gender','$hobby','$country')";


            if (!mysqli_query($conn, $sql)) {
                die('Error: ' . mysqli_error($conn));
                } 
            else {
                echo '<script language="javascript">';
                echo 'alert("Successfully Data Inserted"); location.href="display.php"';
                echo '</script>';
                }    
        }    
    }
    function input_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}