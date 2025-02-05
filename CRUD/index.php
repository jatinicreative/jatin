<html>
    <head>
        <title>CRUD OPERATIONS</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    </head>
    <body>
        <?php 
            include 'db.php';
            include 'nav.html';
            include 'add.php"';
        ?>
        <h4> User Form..</h4>

        <form action="" method="POST" enctype="multipart/form-data">
            <label>First Name :-</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($first_name ?? '') ?>">
            <span class="text-danger"><?= $firstnameErr ?? '' ?></span><br><br>

            <label>Last Name :-</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($last_name ?? '') ?>">
            <span class="text-danger"><?= $lastnameErr ?? '' ?></span><br><br>

            <label>Email :-</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
            <span class="text-danger"><?= $emailErr ?? '' ?></span><br><br>

            <label>Password :-</label>
            <input type="password" name="pass" value="<?= htmlspecialchars($pass ?? '') ?>">
            <span class="text-danger"><?= $passwordErr ?? '' ?></span><br><br>

            <label>Confirm Password :-</label>
            <input type="password" name="cpass" value="<?= htmlspecialchars($cpass ?? '') ?>" >
            <span class="text-danger"><?= $cpasswordErr ?? '' ?></span><br><br>

            <label>Profile Image :-</label>
            <input type="file" name="file" accept="image/*"/>
            <span class="text-danger"><?= $imageErr ?? '' ?></span><br><br>

            <label>Address :-</label>
            <input type="textarea" name="address" value="<?= htmlspecialchars($address ?? '') ?>" >
            <span class="text-danger"><?= $messageErr ?? '' ?></span><br><br>

            <label>Phone No :-</label>
            <input type="tel" name="phone" value="<?= htmlspecialchars($phone ?? '') ?>">
            <span class="text-danger"><?= $numberErr ?? '' ?></span><br><br>

            <label>Gender :-</label>
            <input type="radio" name="gender" value="male" <?= isset($gender) && $gender == 'male' ? 'checked' : '' ?>>Male
            <input type="radio" name="gender" value="female" <?= isset($gender) && $gender == 'female' ? 'checked' : '' ?>>Female
            <span class="text-danger"><?= $genderErr ?? '' ?></span><br>

            <label>Hobby :-</label>
            <input type="checkbox" name="hobby[]" value="music"  <?= isset($hobby) && strpos($hobby, 'music') !== false ? 'checked' : '' ?> >Music
            <input type="checkbox" name="hobby[]" value="dance"   <?= isset($hobby) && strpos($hobby, 'dance') !== false ? 'checked' : '' ?>>Dance
            <input type="checkbox" name="hobby[]" value="coding"  <?= isset($hobby) && strpos($hobby, 'coding') !== false ? 'checked' : '' ?>>Coding
            <span class="text-danger"><?= $hobbyErr ?? '' ?></span><br>

            <label>Country :-</label>
            <select name="country">
                <option value="India" <?= isset($country) && $country == 'India' ? 'selected' : '' ?>>India</option>
                <option value="Pakistan" <?= isset($country) && $country == 'Pakistan' ? 'selected' : '' ?>>Pakistan</option>
                <option value="Sri Lanka" <?= isset($country) && $country == 'Sri Lanka' ? 'selected' : '' ?>>Sri Lanka</option>
            </select>
            <span class="text-danger"><?= $countryErr ?? '' ?></span><br>

            <input type="submit" name="add" value="SUBMIT">

        </form>
    </body>
</html>