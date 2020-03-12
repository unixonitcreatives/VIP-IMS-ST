  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">VIP International</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

                    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="invoice-add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Invoice</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="invoice-manage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Invoice</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="invoice-paid.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid Invoice</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                <a href="invoice-unpaid.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unpaid Invoice</p>
                </a>
              </li> -->
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Stocks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="stock-request.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Stocks</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="stock-request-history.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request History</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="stock-view.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Stocks</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="stockist-profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
