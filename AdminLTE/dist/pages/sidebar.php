<?php     
    session_start();
    if (isset($_SESSION['login_in']) ) {
     
    }
    else {
      header('Location: login.php');
      exit();
  
    }
?>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <div class="sidebar-brand">
          <a href="./index.php" class="brand-link">
            <img
              src="../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <span class="brand-text fw-light">AdminLTE 4</span>
          </a>
      </div>
      <div class="sidebar-wrapper">
          <nav class="mt-2">
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                  Crud Operation
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./form.php" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>User Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./display.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Display User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                  Crud Operation (OOPS)
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./oform.php" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>User Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./odisplay.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Display User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                  Crud Operation (AJAX)
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./aform.php" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>User Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./adisplay.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Display User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
          </nav>
        </div>
</aside>
