
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../../dist/css/adminlte.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
    <style>
      .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
      }
      .form-container {
        width: 100%;
        max-width: 600px;
      }
    </style>
  </head>

  <?php include ("header.php"); ?>

  <?php include ("sidebar.php"); ?>
  <?php
    include 'db.php';

  
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $result = $conn->query("SELECT * FROM user WHERE id = $id");
      if ($result && $result->num_rows > 0) {
          $user = $result->fetch_assoc();
      } else {
          die("User not found.");
      }
    }

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
    ?>
                
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
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <script src="../../dist/js/adminlte.js"></script>
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
  </body>
</html>
