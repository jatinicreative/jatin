<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'] ?? '';
      $first_name = $_POST['first_name'] ?? '';
      $last_name = $_POST['last_name'] ?? '';
      $email = $_POST['email'] ?? '';
      $address = $_POST['address'] ?? '';
      $phone = $_POST['phone'] ?? '';
      $gender = $_POST['gender'] ?? '';
      $hobby = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : '';
      $country = $_POST['country'] ?? '';

      $target_file = '';
      if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
          $target_file = basename($_FILES["file"]["name"]);
          $upload_path = "images/" . $target_file;

          if (!move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
              die('File upload failed.');
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
    