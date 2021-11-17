<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
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
            <a href="./dashboard.php" class="btn btn-warning px-3 me-2 d-flex align-items-center"><span class="material-icons me-3">person</span>My Account</a>
       <?php endif; ?>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->