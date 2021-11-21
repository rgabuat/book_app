<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="./">
      <img
        src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
        height="16"
        alt=""
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./">Home</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <?php if(!isset($_SESSION['username'])): ?>
            <a href="./admin.php" class="btn btn-link px-3 me-2">Login </a>
            <a href="./register.php" class="btn btn-primary me-3">Sign up for free</a>
        <?php else: ?>
            <a href="#" class="dropdown-toggle d-flex align-items-center hidden-arrow btn btn-warning px-3 me-2 d-flex align-items-center" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false" ><span class="material-icons me-3">person</span>My Account</a>
            <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
            style="right:auto !important;" 
            >
            <li>
              <a class="dropdown-item" href="./dashboard.php">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>
              <a class="dropdown-item" href="./actions/logout.php">Logout</a>
            </li>
          </ul>
          <a class="text-reset me-3" href="./cart.php">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge rounded-pill badge-notification bg-danger"><?= !empty($_SESSION['cart'])  ? count($_SESSION['cart']): ''; ?></span>
          </a>
       <?php endif; ?>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->