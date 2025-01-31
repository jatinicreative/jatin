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

    if (mysqli_query($conn, $sql)) {
        $response = ["status" => "success", "message" => "Successfully Updated"];
    } else {
        $response = ["status" => "error", "message" => "Error in updating record"];
    }
}

echo json_encode($response);
exit;
