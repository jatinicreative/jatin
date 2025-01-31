<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM user WHERE id = $id");
    $user = $result->fetch_assoc();
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

        <img src="./image/<?= htmlspecialchars($user['file']) ?>" width="100" height="100" alt="Profile Image"><br>
        <label>Update Profile Image :-</label>
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