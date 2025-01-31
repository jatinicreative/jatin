<?php 
    session_start();
    if (isset($_SESSION['login_in']) ) {

    }
    else {
      header('Location: login.php');
      exit();
    }
    include("header.php"); 
    include("sidebar.php"); 
?>
<html> 
  <head>
    <title>User Form</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">Input User Details</div>
        <form id="userForm" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="mb-3">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="pass" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Confirm Password</label>
              <input type="password" name="cpass" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Profile Image</label>
              <input type="file" name="file" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Address</label>
              <input type="text" name="address" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Phone No</label>
              <input type="text" name="phone" class="form-control" />
            </div>
            <div class="mb-3">
              <label>Gender</label>
              <div>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
              </div>
            </div>
            <div class="mb-3">
              <label>Hobbies</label>
              <div>
                <input type="checkbox" name="hobby[]" value="music"> Music
                <input type="checkbox" name="hobby[]" value="dance"> Dance
                <input type="checkbox" name="hobby[]" value="coding"> Coding
              </div>
            </div>
            <div class="mb-3">
              <label>Country</label>
              <select name="country" class="form-control">
                <option value="India">India</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Sri Lanka">Sri Lanka</option>
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  <footer>  
  <script>
    $(document).ready(function () {
      $("#userForm").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "aadd.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
              if (response.status === "success") {
                alert(response.message);
                $("#userForm")[0].reset();

              } else {
                alert(response.message);
              }
            },
            error: function (xhr, status, error) {
              alert("Error: " + xhr.responseText);
            }
          });
      });
  });
  </script>
  </footer>
    <?php include("footer.php"); ?>
  </body>
</html>