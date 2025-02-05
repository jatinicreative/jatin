<?php
    session_start();
    if (isset($_SESSION['login_in']) ) {
    }
    else {
        header('Location: ./../login.php');
        exit();
    }
    include("../header.php");
    include("../sidebar.php");
    require_once 'add.php';
?>
<html>
  <body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Input User Details</div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($first_name) ?>" />
                        <span class="text-danger"><?= $errors['first_name'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($last_name) ?>" />
                        <span class="text-danger"><?= $errors['last_name'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" />
                        <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" value="<?= htmlspecialchars($pass ?? '') ?>"/>
                        <span class="text-danger"><?= $errors['pass'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="cpass" class="form-control" value="<?= htmlspecialchars($cpass ?? '') ?>"/>
                        <span class="text-danger"><?= $errors['cpass'] ?? '' ?></span>
                        <span class="text-danger"><?= $errors['ppass'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Profile Image</label>
                        <input type="file" name="file" class="form-control"/>
                        <span class="text-danger"><?= $errors['file'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($address) ?>" />
                        <span class="text-danger"><?= $errors['address'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Phone No</label>
                        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($phone) ?>" />
                        <span class="text-danger"><?= $errors['phone'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <div>
                            <input type="radio" name="gender" value="male" <?= $gender == "male" ? "checked" : "" ?>> Male
                            <input type="radio" name="gender" value="female" <?= $gender == "female" ? "checked" : "" ?>> Female
                        </div>
                        <span class="text-danger"><?= $errors['gender'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Hobbies</label>
                        <div>
                            <input type="checkbox" name="hobby[]" value="music" <?= strpos($hobby, "music") !== false ? "checked" : "" ?>> Music
                            <input type="checkbox" name="hobby[]" value="dance" <?= strpos($hobby, "dance") !== false ? "checked" : "" ?>> Dance
                            <input type="checkbox" name="hobby[]" value="coding" <?= strpos($hobby, "coding") !== false ? "checked" : "" ?>> Coding
                        </div>
                        <span class="text-danger"><?= $errors['hobby'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label>Country</label>
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            <option value="India" <?= $country == "India" ? "selected" : "" ?>>India</option>
                            <option value="Pakistan" <?= $country == "Pakistan" ? "selected" : "" ?>>Pakistan</option>
                            <option value="Sri Lanka" <?= $country == "Sri Lanka" ? "selected" : "" ?>>Sri Lanka</option>
                        </select>
                        <span class="text-danger"><?= $errors['country'] ?? '' ?></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="oadd">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <?php include("../footer.php"); ?>
</body>
</html>
