<?php
    header('Content-Type: application/json');
    include "db.php";

    $response = ["status" => "error", "errors" => []];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['pass'] ?? '';
        $cpassword = $_POST['cpass'] ?? '';
        $address = $_POST['address'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $hobby = isset($_POST['hobby']) ? implode(', ', $_POST['hobby']) : '';
        $country = $_POST['country'] ?? '';

        $errors = [];

        if (empty($first_name)) 
        {   $errors['first_name'] = "First name is required."; }

        if (empty($last_name)) 
        {   $errors['last_name'] = "Last name is required.";  }

        if (empty($email)) 
        {    $errors['email'] = "Email is required.";   }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {   $errors['email'] = "Invalid email format."; }

        if (empty($password)) 
        {   $errors['pass'] = "Password is required."; }
        elseif (strlen($password) < 5) 
        {   $errors['pass'] = "Password must be at least 5 characters.";    }

        if ($password !== $cpassword)
        {   $errors['cpass'] = "Passwords do not match.";   }

        if (empty($address)) 
        {   $errors['address'] = "Address is required.";    }

        if (empty($phone)) 
        {   $errors['phone'] = "Phone number is required.";     }
        elseif (!preg_match("/^[0-9]{10}$/", $phone)) 
        {   $errors['phone'] = "Phone number must be 10 digits.";   }
        
        if (empty($gender)) 
        {   $errors['gen'] = "Gender is required.";     }

        if (empty($hobby)) 
        {   $errors['hob'] = "Hobby is required.";     }
                
        if (empty($country)) 
        {   $errors['country'] = "Please select a country.";    }
    

        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $target_file = basename($_FILES['file']['name']);
            $upload_path = "uploads/" . $target_file;
            if(!move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {
                $errors['file'] = "Failed to upload the file.";
            }
        }

        if (empty($errors)) {
            $sql = "INSERT INTO user (first_name, last_name, email, pass, file, address, phone, gender, hobby, country)
                VALUES ('$first_name', '$last_name', '$email', '$password', '$target_file', '$address', '$phone', '$gender', '$hobby', '$country')";

            if (mysqli_query($conn, $sql)) {
                $response = ["status" => "success", "message" => "User data successfully inserted."];
            } else {
                $response = ["status" => "error", "message" => "Database error: " . mysqli_error($conn)];
            }
        } else {
            $response["errors"] = $errors;
        }
    }
echo json_encode($response);
