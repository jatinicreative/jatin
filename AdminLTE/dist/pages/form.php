<?php 
  session_start();
  if (isset($_SESSION['login_in']) ) {
   
  }
  else {
    header('Location: login.php');
    exit();

  }
  include ("header.php"); 
  include ("sidebar.php"); 
  include("add.php");
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
                      <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($first_name ?? '') ?>" />
                      <span class="text-danger"><?= $firstnameErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Last Name</label>
                      <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($last_name ?? '') ?>" />
                      <span class="text-danger"><?= $lastnameErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email ?? '') ?>" />
                      <span class="text-danger"><?= $emailErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Password</label>
                      <input type="password" name="pass" class="form-control" />
                      <span class="text-danger"><?= $passwordErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Confirm Password</label>
                      <input type="password" name="cpass" class="form-control" />
                      <span class="text-danger"><?= $cpasswordErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Profile Image</label>
                      <input type="file" name="file" class="form-control" />
                      <span class="text-danger"><?= $imageErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($address ?? '') ?>" />
                      <span class="text-danger"><?= $messageErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Phone No</label>
                      <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($phone ?? '') ?>" />
                      <span class="text-danger"><?= $numberErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Gender</label>
                      <div>
                          <input type="radio" name="gender" value="male" <?= isset($gender) && $gender == 'male' ? 'checked' : '' ?>> Male
                          <input type="radio" name="gender" value="female" <?= isset($gender) && $gender == 'female' ? 'checked' : '' ?>> Female
                      </div>
                      <span class="text-danger"><?= $genderErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Hobbies</label>
                      <div>
                          <input type="checkbox" name="hobby[]" value="music" <?= isset($hobby) && strpos($hobby, 'music') !== false ? 'checked' : '' ?>> Music
                          <input type="checkbox" name="hobby[]" value="dance" <?= isset($hobby) && strpos($hobby, 'dance') !== false ? 'checked' : '' ?>> Dance
                          <input type="checkbox" name="hobby[]" value="coding" <?= isset($hobby) && strpos($hobby, 'coding') !== false ? 'checked' : '' ?>> Coding
                      </div>
                      <span class="text-danger"><?= $hobbyErr ?? '' ?></span>
                  </div>
                  <div class="mb-3">
                      <label>Country</label>
                      <select name="country" class="form-control">
                          <option value="India" <?= isset($country) && $country == 'India' ? 'selected' : '' ?>>India</option>
                          <option value="Pakistan" <?= isset($country) && $country == 'Pakistan' ? 'selected' : '' ?>>Pakistan</option>
                          <option value="Sri Lanka" <?= isset($country) && $country == 'Sri Lanka' ? 'selected' : '' ?>>Sri Lanka</option>
                      </select>
                      <span class="text-danger"><?= $countryErr ?? '' ?></span>
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="add">Submit</button>
              </div>
          </form>
      </div>
  </div>
  <?php include ("footer.php"); ?>
  </body>
</html>