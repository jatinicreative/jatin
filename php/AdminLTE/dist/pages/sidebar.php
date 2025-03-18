<?php     

    $current_page = ($_SERVER['PHP_SELF']);
   

?>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <div class="sidebar-brand">
          <a href="./index.php" class="brand-link">
            <img
              src="../../assets/img/AdminLTELogo.png"
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
              <li class="nav-item <?= str_contains($current_page,'crud') ? 'menu-open' :''?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                  Simple Crud
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./../crud/form.php" class="nav-link <?= $current_page == '/jatin/AdminLTE/dist/pages/crud/form.php' ? 'active' :''?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>User Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./../crud/display.php" class="nav-link <?= $current_page == '/jatin/AdminLTE/dist/pages/crud/display.php' ? 'active' :''?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Display User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?= str_contains($current_page,'oop') ? 'menu-open' :''?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                  OOPS Crud
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./../oop/form.php" class="nav-link <?= $current_page == '/jatin/AdminLTE/dist/pages/oop/form.php' ? 'active' :''?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>User Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./../oop/display.php" class="nav-link <?= $current_page == '/jatin/AdminLTE/dist/pages/oop/display.php' ? 'active' :''?> ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Display User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?= str_contains($current_page,'ajax') ? 'menu-open' :''?>">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                  AJAX Crud
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./../ajax/form.php" class="nav-link <?= $current_page == '/jatin/AdminLTE/dist/pages/ajax/form.php' ? 'active' :''?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>User Form</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./../ajax/display.php" class="nav-link <?= $current_page == '/jatin/AdminLTE/dist/pages/ajax/display.php' ? 'active' :''?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Display User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
          </nav>
        </div>
</aside>
