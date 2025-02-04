<?php

include 'db.php';

$firstnameErr = $lastnameErr = $emailErr = $numberErr = $genderErr = $hobbyErr = $countryErr = $messageErr = "";
$first_name = $last_name = $email = $address = $phone = $gender = $hobby = $country = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
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
	
    $target_file = '';
    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
          $target_file = basename($_FILES["file"]["name"]);
          $upload_path = "images/" . $target_file;

          if (!move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
              die('File upload failed.');
          }
    }


    if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($numberErr) && empty($messageErr) && empty($genderErr) && empty($hobbyErr) && empty($countryErr)) {
        
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

  
      if (!mysqli_query($conn, $sql)) {
          die('Error updating record: ' . mysqli_error($conn));
      } else {
          echo '<script>
                  alert("Successfully Updated!");
                  window.location.href="display.php";
                </script>';
          exit;
      }
    }
}