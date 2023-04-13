<!-- Navbar -->
   <!-- partial:partials/_navbar.html -->
   <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown" style="padding: 10px;">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false"><span class="font-weight-normal"> Welcome, <?=$_SESSION['login_firstname']?>!</span></a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown" aria-labelledby="UserDropdown">
                <a href="./index.php?page=view_user" class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
                <a href="ajax.php?action=logout" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
  <!-- /.navbar -->
