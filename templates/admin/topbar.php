<!-- Navbar -->
<nav class=" navbar fixed-top navbar-expand-lg navbar-light shadow-2" style="background-color: #AC94F4 !important">
  <!-- Container wrapper -->
  <div id="topbar" class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button"> <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="./index.php">
        <img
          src="petlogo.png"
          height="45"
          alt="logo"
          loading="lazy"
        />
      </a>

    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->

      <!-- Avatar -->
      <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
      
        <img
          src="<?= !empty($user['image']) ? './uploads/'.$user['image'] : 'uploads/img_avatar.png' ?>"
          class="rounded-circle"
          height="25"
          alt=""
          loading="lazy"
        />
      
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="?page=profile">My profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="./actions/logout.php">Logout</a>
        </li>
      </ul>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->