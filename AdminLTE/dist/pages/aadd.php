<?php
header('Content-Type: application/json');
include "adb.php";

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = implode(', ', $_POST['hobby']);
    $country = $_POST['country'];

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $target_file = basename($_FILES['file']['name']);
        $upload_path = "uploads/".$target_file;

        if (!move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {
            $response = ["status" => "error", "message" => "Failed to upload the file."];
            echo json_encode($response);
            exit;
        }

    }

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($cpassword) || empty($address) || empty($phone) || empty($gender) || empty($country)) {
        $response = ["status" => "error", "message" => "Please fill in all the required fields."];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ["status" => "error", "message" => "Invalid email format."];
    } elseif ($password !== $cpassword) {
        $response = ["status" => "error", "message" => "Passwords do not match."];
    } elseif ($password < 5) {
        $response = ["status"=> "error", "message"=> "Password Should be minimum 5 Character"];
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $response = ["status" => "error", "message" => "Phone number must be 10 digits."];
    } else {
        $sql = "INSERT INTO user (first_name, last_name, email, pass, file, address, phone, gender, hobby, country) 
                VALUES ('$first_name', '$last_name', '$email', '$password', '$target_file', '$address', '$phone', '$gender', '$hobby', '$country')";

        if (mysqli_query($conn,$sql) === TRUE) {
            $response = ["status" => "success", "message" => "User data successfully inserted."];
         
        } else {
            $response = ["status" => "error", "message" => "Database error: ". mysqli_error($conn)];
        }
    }
}
echo json_encode($response);