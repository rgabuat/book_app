<!-- Navbar -->
<nav class=" navbar fixed-top navbar-expand-lg navbar-light shadow-2" style="background-color: #2f6690 !important">
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
          src="uploads/TFavicon.png"
          height="45"
          alt="logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Projects</a>
        </li>
      </ul> -->
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="./cart.php">
        <i class="fas fa-shopping-cart" style="color: #ffffff !important"></i>
      </a>

      <!-- Notifications -->
      <!-- <a
        class="text-reset me-3 dropdown-toggle hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
        <i class="fas fa-bell"></i>
        <span class="badge rounded-pill badge-notification bg-danger">1</span>
      </a> -->
      <!-- <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="#">Some news</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Another news</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Something else here</a>
        </li>
      </ul> -->

      <!-- Avatar -->
      <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
      <?php 
            $result = mysqli_query($conn,"SELECT * FROM users_login WHERE id='".$_SESSION['id']."'");
            if(mysqli_num_rows($result) > 0):
            foreach($result as $user):
          ?>
        <img
          src="<?= !empty($user['image']) ? './uploads/'.$user['image'] : 'uploads/img_avatar.png' ?>"
          class="rounded-circle"
          height="25"
          alt=""
          loading="lazy"
        />
      <?php 
        endforeach;
        endif;
      ?>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="?page=profile">My profile</a>
        </li>
        <!-- <li>
          <a class="dropdown-item" href="#">Settings</a>
        </li> -->
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