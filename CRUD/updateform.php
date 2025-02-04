<?php
include 'db.php';
include 'update.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM user WHERE id = $id");
    $user = $result->fetch_assoc();
}
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
<body>
    <h4>Update Details..</h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        
        <label>First Name :-</label>
        <?php $first_name = isset($_POST['first_name']) ? $_POST['first_name'] :$user['first_name']; ?>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br><br>
        <span class="text-danger"><?= $firstnameErr ?? '' ?></span> <br>

        <label>Last Name :-</label>
        <?php $last_name = isset($_POST['last_name']) ? $_POST['last_name'] :$user['last_name']; ?>
        <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br><br>
        <span class="text-danger"><?= $lastnameErr ?? '' ?></span> <br>

        <label>Email :-</label>
        <?php $email = isset($_POST['email']) ? $_POST['email'] : $user['email']; ?>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
        <span class="text-danger"><?= $emailErr ?? '' ?></span> <br>

        <img src="./image/<?= htmlspecialchars($user['file']) ?>" width="100" height="100" alt="Profile Image"><br>
        <label>Update Profile Image :-</label>
        <input type="file" name="file" accept="image/*"/><br><br>

        <label>Address :-</label>
        <?php $address = isset($_POST['address']) ? $_POST['address'] : $user['address']; ?>
        <input type="textarea" name="address" value="<?php echo $address ?>"><br><br>
        <span class="text-danger"><?= $messageErr ?? '' ?></span> <br>

        <label>Phone No :-</label>
        <?php $phone = isset($_POST['phone']) ? $_POST['phone'] : $user['phone']; ?>
        <input type="tel" name="phone" value="<?php echo $phone; ?>"><br><br>
        <span class="text-danger"><?= $numberErr ?? '' ?></span> <br>

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