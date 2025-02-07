<?php

    include ("../header.php"); 
    include ("../sidebar.php"); 
    require_once ('update.php');
    if(isset($_GET['id']))
    {   
      $id=$_GET['id'];
      $fetchdata=new CRUD();
      $sql=$fetchdata->singlefetchdata($id);
      if ($sql) {
          $user = $sql->fetch_assoc();
      } else {
          die("User not found.");
      }
    }
?>
            
      <div class="card card-primary card-outline mb-4">
        <div class="card-header"><div class="card-title">Input User Details..</div></div>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="mb-3">
                        <label>First Name</label>
                        <?php $first_name = isset($_POST ['first_name'])?$_POST['first_name']:$user['first_name']; ?>
                        <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control" />
                        <span class="text-danger"><?= $errors['first_name'] ?? '' ?></span>
                      </div>
                      
                      <div class="mb-3">
                        <label>Last Name</label>
                        <?php $last_name = isset($_POST ['last_name'])?$_POST['last_name']:$user['last_name']; ?>
                        <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control" />
                        <span class="text-danger"><?= $errors['last_name'] ?? '' ?></span>
                      </div>
                      
                      <div class="mb-3">
                        <label>Email</label>
                        <?php $email = isset($_POST ['email'])?$_POST['email']:$user['email']; ?>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
                      </div>
                      

                      <div class="mb-3">
                      <img src="image/<?= htmlspecialchars($user['file']) ?>" width="100" height="100" alt="Profile Image"><br>
                      <label>Update Profile Image</label>
                        <input type="file" name="file" accept="image/*" class="form-control"  />
                      </div>
                      
                      <div class="mb-3">
                        <label>Address</label>
                        <?php $address = isset($_POST ['address'])?$_POST['address']:$user['address']; ?>
                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" />
                        <span class="text-danger"><?= $errors['address'] ?? '' ?></span>
                      </div>
                      
                      <div class="mb-3">
                        <label>Phone No</label>
                        <?php $phone = isset($_POST ['phone'])?$_POST['phone']:$user['phone']; ?>
                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" />
                        <span class="text-danger"><?= $errors['phone'] ?? '' ?></span>
                      </div>

                      <div class="mb-3">
                      <label>Gender :-</label>
                      <?php $gender = isset($_POST['gender']) ? $_POST['gender']:$user['gender']; ?>
                      <input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?> >Male
                      <input type="radio" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>>Female<br>
                      <span class="text-danger"><?= $errors['gender'] ?? '' ?></span>
                      </div>

                      <div class="mb-3">
                      <label>Hobby :-</label>
                      <input type="checkbox" name="hobby[]" value="music" <?php echo strpos($user['hobby'], 'music') !== false ? 'checked' : ''; ?> >Music
                      <input type="checkbox" name="hobby[]" value="dance" <?php echo strpos($user['hobby'], 'dance') !== false ? 'checked' : ''; ?>>Dance
                      <input type="checkbox" name="hobby[]" value="coding" <?php echo strpos($user['hobby'], 'coding') !== false ? 'checked' : ''; ?>>Coding<br>
                      <span class="text-danger"><?= $errors['hobby'] ?? '' ?></span>
                      </div>
                      

                      <div class="mb-3">  
                      <label>Country :-</label>
                      <?php $country = isset($_POST['country']) ? $_POST['country']:$user['country']; ?>
                      <select name="country">
                          <option value="" <?php echo ($country == '') ? 'selected' : ''; ?>>Select Country</option>
                          <option value="India" <?php echo ($country == 'India') ? 'selected' : ''; ?>>India</option>
                          <option value="Pakistan" <?php echo ($country == 'Pakistan') ? 'selected' : ''; ?>>Pakistan</option>
                          <option value="Sri Lanka" <?php echo ($country == 'Sri Lanka') ? 'selected' : ''; ?>>Sri Lanka</option>
                      </select><br>
                      <span class="text-danger"><?= $errors['country'] ?? '' ?></span>
                      
                      
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                  </form>
                </div>

  <?php include ("../footer.php"); ?>

