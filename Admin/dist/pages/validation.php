<?php

$first_name_error = '';
$last_name_error = '';
$email_error = '';
$email_format_error = '';
$pass_error = '';
$pass_legth_error = '';
$pass_macth_error = '';
$cpass_error = '';
$address_error = '';
$phone_error = '';
$gender_error = '';
$hobby_error = '';
$country_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'] ;
    $email = $_POST['email'] ;
    $pass = $_POST['pass'] ;   
    $cpass = $_POST['cpass'];
    $address = $_POST['address'];
    $phone = $_POST['phone'] ;
    $gender = $_POST['gender'] ;
    $hobby = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']):'';
    $country = $_POST['country'];


    if (empty($first_name)) {
        $first_name_error = "First name is required.";
    }
    if (empty($last_name)) {
        $last_name_error = "Last name is required.";
    }
    if (empty($email)) {
        $email_error = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_format_error = "Invalid email format.";
    }
    if (empty($pass)) {
        $pass_error = "Password is required.";
    } elseif (strlen($pass) < 5) {
        $pass_legth_error = "Password must be at least 5 characters long.";
    }
    if (empty($cpass)) {
        $cpass_error = "Confirm password is required.";
    } elseif ($pass !== $cpass) {
        $pass_macth_error = "Password and confirm password do not match.";
    }
    if (empty($address)) {
        $address_error = "Address is required.";
    }
    if (empty($phone)) {
        $phone_error = "Phone number is required.";
    }
    if (empty($gender)) {
        $gender_error = "Gender is required.";
    }
    if (empty($hobby)) {
        $hobby_error = "At least one hobby must be selected.";
    }
    if (empty($country)) {
        $country_error = "Country is required.";
    }

}