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
    include ("db.php");
  
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $result = $conn->query("SELECT * FROM user WHERE id = $id");
      if ($result && $result->num_rows > 0) {
          $user = $result->fetch_assoc();
      } else {
          die("User not found.");
      }
    }
  ?>
  <html>
    <body>                
      <div class="card card-primary card-outline mb-4">
        <div class="card-header"><div class="card-title">Input User Details..</div></div>
          <form action="update.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" class="form-control" />
                      </div>
                      
                      <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" class="form-control" />
                      </div>
                      
                      <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control" />
                      </div>
                      

                      <div class="mb-3">
                      <img src="images/<?= htmlspecialchars($user['file']) ?>" width="100" height="100" alt="Profile Image"><br>
                      <label>Update Profile Image</label>
                        <input type="file" name="file" accept="image/*" class="form-control"  />
                      </div>
                      
                      <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $user['address']; ?>" class="form-control" />
                      </div>
                      
                      <div class="mb-3">
                        <label>Phone No</label>
                        <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control" />
                      </div>

                      <div class="mb-3">
                      <label>Gender :-</label>
                      <input type="radio" name="gender" value="male" <?php echo ($user['gender'] == 'male') ? 'checked' : ''; ?> >Male
                      <input type="radio" name="gender" value="female" <?php echo ($user['gender'] == 'female') ? 'checked' : ''; ?>>Female<br>
                      </div>

                      <div class="mb-3">
                      <label>Hobby :-</label>
                      <input type="checkbox" name="hobby[]" value="music" <?php echo strpos($user['hobby'], 'music') !== false ? 'checked' : ''; ?> >Music
                      <input type="checkbox" name="hobby[]" value="dance" <?php echo strpos($user['hobby'], 'dance') !== false ? 'checked' : ''; ?>>Dance
                      <input type="checkbox" name="hobby[]" value="coding" <?php echo strpos($user['hobby'], 'coding') !== false ? 'checked' : ''; ?>>Coding<br>
                      </div>

                      <div class="mb-3">  
                      <label>Country :-</label>
                      <select name="country">
                          <option value="India" <?php echo ($user['country'] == 'India') ? 'selected' : ''; ?>>India</option>
                          <option value="Pakistan" <?php echo ($user['country'] == 'Pakistan') ? 'selected' : ''; ?>>Pakistan</option>
                          <option value="Sri Lanka" <?php echo ($user['country'] == 'Sri Lanka') ? 'selected' : ''; ?>>Sri Lanka</option>
                      </select><br>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                  </form>
                </div>

        <?php include ("footer.php"); ?>
  </body>
</html>
