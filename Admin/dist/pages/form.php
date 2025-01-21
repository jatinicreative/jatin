<html>
  <head>
    <title>Own AdminLTE </title>
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
    

  </head>

  <?php 
  include ("header.php"); 
  include ("sidebar.php"); 
  include ("add.php");
  ?>
  <body>
    <div class="card card-primary card-outline mb-4">
      <div class="card-header"><div class="card-title">Input User Details..</div></div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
                      <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?php $_POST['first_name']; ?>" class="form-control" />
                        <span>
                        <?php echo $first_name_error; ?>
                        </span>
                      </div>
                      
                      <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?php $_POST['last_name']; ?>" class="form-control" />
                        <span>
                        <?php echo $last_name_error; ?>
                        </span>
                      </div>
                      
                      <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php $_POST['email']; ?>" class="form-control" />
                        <span>
                        <?php echo $email_error; ?>
                        </span>
                      </div>
                      
                      <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="pass" value="<?php $_POST['pass']; ?>" class="form-control" />
                        <span>
                        <?php echo $pass_error; ?>
                        </span>
                      </div>
                      <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="cpass" value="<?php $_POST['cpass']; ?>" class="form-control" />
                        <span>
                        <?php echo $cpass_error;
                              echo $pass_legth_error;
                              echo $pass_match_error ?>
                        </span>
                      </div>

                      <div class="mb-3">
                      <label>Profile Image</label>
                        <input type="file" name="file" accept="image/*" value="<?php $_POST['file']; ?>" class="form-control"  />
                      </div>
                      
                      <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="<?php $_POST['address']; ?>" />
                      </div>
                      
                      <div class="mb-3">
                        <label>Phone No</label>
                        <input type="text" name="phone" class="form-control" value="<?php $_POST['phone']; ?>"/>
                      </div>

                      <div class="mb-3">
                      <label>Gender :-</label>
                      <input type="radio" name="gender" value="male <?php echo ($_POST['gender'] == 'male') ? 'checked' : ''; ?>" >Male
                      <input type="radio" name="gender" value="female <?php echo ($_POST['gender'] == 'female') ? 'checked' : ''; ?> "  >Female<br>
                      </div>

                      <div class="mb-3">
                      <label>Hobby :-</label>
                      <input type="checkbox" name="hobby[]" value="music <?php echo strpos($_POST['hobby'], 'music') !== false ? 'checked' : ''; ?>" >Music
                      <input type="checkbox" name="hobby[]" value="dance <?php echo strpos($_POST['hobby'], 'dance') !== false ? 'checked' : ''; ?>" >Dance
                      <input type="checkbox" name="hobby[]" value="coding <?php echo strpos($_POST['hobby'], 'coding') !== false ? 'checked' : ''; ?>" >Coding<br>
                      </div>

                      <div class="mb-3">
                      <label>Country :-</label>
                      <select name="country">
                          <option value="India <?php echo ($_POST['country'] == 'India') ? 'selected' : ''; ?>">India</option>
                          <option value="Pakistan <?php echo ($_POST['country'] == 'India') ? 'selected' : ''; ?>">Pakistan</option>
                          <option value="Sri Lanka <?php echo ($_POST['country'] == 'India') ? 'selected' : ''; ?>">Sri Lanka</option>
                      </select><br>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="add">Submit</button>
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
