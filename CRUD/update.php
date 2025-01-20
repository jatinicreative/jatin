<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM user WHERE id = $id");
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hobby = implode(", ", $_POST['hobby']);
    $country = $_POST['country'];


    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
        $file = $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];
        $folder = "./image/" . $file;

        if ($_FILES["file"]["error"] > 0) {
            die("Error uploading file: " . $_FILES["file"]["error"]);
        }

        if ($_FILES['file']['size'] == 0) {
            die("File is empty.");
        }

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_extensions)) {
            die("Only JPG, JPEG, and PNG files are allowed.");
        }

        if (!move_uploaded_file($tempname, $folder)) {
            die("Failed to move the uploaded file.");
        }

   
        $sql = "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', file='$file', address='$address', phone='$phone', gender='$gender', hobby='$hobby', country='$country' WHERE id='$id'";
    } else {
      
        $sql = "UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', address='$address', phone='$phone', gender='$gender', hobby='$hobby', country='$country' WHERE id='$id'";
    }

    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successfully Data Updated"); location.href="display.php"';
        echo '</script>';
    }
}
?>
<html>
<body>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label>First Name :-</label>
        <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>"><br><br>

        <label>Last Name :-</label>
        <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>"><br><br>

        <label>Email :-</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>

        <label>Profile Image :-</label>
        <input type="file" name="file" accept="image/*"/><br><br>

        <label>Address :-</label>
        <input type="textarea" name="address" value="<?php echo $user['address']; ?>"><br><br>

        <label>Phone No :-</label>
        <input type="tel" name="phone" value="<?php echo $user['phone']; ?>"><br><br>

        <label>Gender :-</label>
        <input type="radio" name="gender" value="male" <?php echo ($user['gender'] == 'male') ? 'checked' : ''; ?>>Male
        <input type="radio" name="gender" value="female" <?php echo ($user['gender'] == 'female') ? 'checked' : ''; ?>>Female<br><br>

        <label>Hobby :-</label>
        <input type="checkbox" name="hobby[]" value="music" <?php echo strpos($user['hobby'], 'music') !== false ? 'checked' : ''; ?>>Music
        <input type="checkbox" name="hobby[]" value="dance" <?php echo strpos($user['hobby'], 'dance') !== false ? 'checked' : ''; ?>>Dance
        <input type="checkbox" name="hobby[]" value="coding" <?php echo strpos($user['hobby'], 'coding') !== false ? 'checked' : ''; ?>>Coding<br><br>

        <label>Country :-</label>
        <select name="country">
            <option value="India" <?php echo ($user['country'] == 'India') ? 'selected' : ''; ?>>India</option>
            <option value="Pakistan" <?php echo ($user['country'] == 'Pakistan') ? 'selected' : ''; ?>>Pakistan</option>
            <option value="Sri Lanka" <?php echo ($user['country'] == 'Sri Lanka') ? 'selected' : ''; ?>>Sri Lanka</option>
        </select><br><br>

        <input type="submit" name="update" value="UPDATE">
    </form>
</body>
</html>
