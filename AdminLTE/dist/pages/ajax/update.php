<?php
    header('Content-Type: application/json');
    include("adb.php");

    $response = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $hobby = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : '';
        $country = $_POST['country'];

        $errors = [];

        if (empty($first_name)) 
        {   $errors['first_name'] = "First name is required."; }

        if (empty($last_name)) 
        {   $errors['last_name'] = "Last name is required.";  }

        if (empty($email)) 
        {    $errors['email'] = "Email is required.";   }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {   $errors['email'] = "Invalid email format."; }

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

        $target_file = '';
        if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
            $target_file = basename($_FILES["file"]["name"]);
            $upload_path = "uploads/" . $target_file;

            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
                $response = ["status" => "error", "message" => "File upload error"];
                echo json_encode($response);
                exit;
            }
        }
    
        if(empty($errors))
        {
        $sql = "UPDATE user SET 
                first_name='$first_name', 
                last_name='$last_name', 
                email='$email', 
                address='$address', 
                phone='$phone', 
                gender='$gender', 
                hobby='$hobby', 
                country='$country'";

        if (!empty($target_file)) {
            $sql .= ", file='$target_file'";
        }
        $sql .= " WHERE id='$id'";
        if (mysqli_query($co, $sql)) {
            $response = ["status" => "success", "message" => "Successfully Updated"];
            } 
        else {
            $response = ["status" => "error", "message" => "Error in updating record"];
            } 
        }
        else {
            $response['errors']= $errors;
        }
    }
echo json_encode($response);
exit;
