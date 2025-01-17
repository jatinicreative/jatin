<?php
include 'db.php';

if (isset($_POST['add'])) {
   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = implode(", ", $_POST['hobby']);
    $country = $_POST['country'];

   
    $image_file = $_FILES["file"];
        
    if (!isset($image_file)) {
        die('No file uploaded.');
    }
    
    move_uploaded_file(
       
        $image_file["tmp_name"],
    
        __DIR__ . "/images/" . $image_file["name"]
    );

    $sql = "INSERT INTO user (first_name, last_name, email, pass, file, address, phone, gender, hobby, country) 
            VALUES ('$first_name','$last_name','$email','$pass','$image_file','$address','$phone','$gender','$hobby','$country')";


    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successfully Data Inserted"); location.href="index.php"';
        echo '</script>';
    }
}
?>
