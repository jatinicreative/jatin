<?php
include 'function.php';
$updatedata=new CRUD();

$errors = [];
$first_name = $last_name = $email = $address = $phone = $gender = $hobby = $country = "";

if(($_SERVER['REQUEST_METHOD'] === 'POST'))
{

    $id=$_POST['id'];

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

    $address = trim($_POST['address']);
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    }

    $phone = trim($_POST['phone']);
    if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) {
        $errors['phone'] = "10 digit Number required";
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


    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES['file']['tmp_name'];

    if (!empty($filename)) {

        $folder = "image/". basename($filename);
        if (!move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('Failed to upload file');</script>";
            $folder = ""; 
        }
    }
    else{
        $fetchdata=new CRUD();
        $sql=$fetchdata->singlefetchdata($id);
        if ($sql) {
        $user = $sql->fetch_assoc();
        $filename = $user['file'];   
    }
    }
    if (empty($errors)) {
    $sql=$updatedata->update($first_name,$last_name,$email,$filename,$address,$phone,$gender,$hobby,$country,$id);
    if($sql){
    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='display.php'</script>";
    }
}
}
