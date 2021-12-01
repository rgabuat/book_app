<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #2f6690 !important">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="./">
      <img
        src="uploads/TFavicon.png"
        height="45"
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
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <?php if(!isset($_SESSION['username'])): ?>
            <a href="./admin.php" class="btn btn-link px-3 me-2 text-white">Login </a>
            <a href="./register.php" class="btn btn-primary me-3">Sign up for free</a>
        <?php else: ?>
            <a href="./dashboard.php" class=" d-flex align-items-center hidden-arrow btn btn-warning px-3 me-2 d-flex align-items-center" id="navbarDropdownMenuLink" role="button" style="background-color: #81c3d7; border-radius: .5rem" aria-expanded="false" ><span class="material-icons me-3">person</span>My Account</a>

       <?php endif; ?>
       <a class="text-reset me-3" href="./cart.php">
            <i class="text-white fas fa-shopping-cart"></i>
            <span class="badge rounded-pill badge-notification bg-danger"><?= !empty($_SESSION['cart'])  ? count($_SESSION['cart']): ''; ?></span>
          </a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->