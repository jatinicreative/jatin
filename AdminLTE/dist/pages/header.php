<?php  
      session_start();
      if (isset($_SESSION['login_in']) ) {
         
      }
      else {
          header('Location: ./../login.php');
          exit();
      
      }
      include 'db.php';  
      if (isset($_SESSION['userid'])) {
        $id = $_SESSION['userid'];

        $query = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
      }

    }
?>
<html>
  <head>
    <title></title>
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
    <link rel="stylesheet" href="../../css/adminlte.css" />
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="./../crud/images/<?= htmlspecialchars($row['file']) ?>"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline"></span>
                        <?php                        
                        echo $row['first_name'];
                        echo ' ';
                        echo $row['last_name'];
                        ?></span> 
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <img
                    src="./../crud/images/<?= htmlspecialchars($row['file']) ?>"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                  <?php
                        echo $row['first_name'];
                        echo ' ';
                        echo $row['last_name'];
                    ?>
                    
                  </p>
                </li>
                
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="./../logout.php" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      </body>
      </html>




