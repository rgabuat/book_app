<div id="sidebar-container" class="sidebar sidebar-expanded d-none d-lg-block" style="background-color:#371576;"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
<a href="#" class=" text-white d-lg-none d-md-block">
<span id="close" class="material-icons p-2 w-100 " style="text-align:right">
close
</span>
</a>
<div class="logo">
    <h2 class="py-3 text-center text-white">MAIN MENU<h2>
</div>
<hr class="w-75 m-auto">

<ul class="nav d-block mt-3">
          <li class="nav-item active ">
            <a class="nav-link d-flex text-white mx-3" href="?page=home">
              <i class="material-icons me-3">dashboard</i>
              <p class="my-auto">Dashboard</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link d-flex text-white mx-3" href="?page=display-shelters">
            <i class="material-icons me-3">person</i>
              <p class="my-auto">Shelters</p>
            </a>
          </li>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'): ?>
          <li class="nav-item active ">
            <a class="nav-link d-flex text-white mx-3" href="?page=mybooks">
            <i class="material-icons me-3">book</i>
              <p class="my-auto">My Books</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
          <li class="nav-item ">
            <a class="nav-link d-flex text-white  mx-3" href="?page=accounts">
              <i class="material-icons me-3">manage_accounts</i>
              <p class="my-auto">Adopters</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex text-white  mx-3" href="?page=cats">
              <i class="fas fa-cat me-3" style="font-size:24px"></i>
              <p class="my-auto">Cats</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex text-white  mx-3" href="?page=dogs">
              <i class="fas fa-dog me-3" style="font-size:24px"></i>
              <p class="my-auto">Dogs</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link d-flex text-white mx-3" href="?page=stats">
              <i class="material-icons me-3">analytics</i>
              <p class="my-auto">Stats</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex text-white mx-3" href="?page=services">
              <i class="material-icons me-3">miscellaneous_services</i>
              <p class="my-auto">Services</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex text-white mx-3" href="?page=support">
              <i class="material-icons me-3">support_agent</i>
              <p class="my-auto">Support</p>
            </a>
          </li> -->
          <li class="nav-item ">
            <a class="nav-link d-flex text-white mx-3" href="?page=logs">
              <i class="material-icons me-3">history</i>
              <p class="my-auto">logs</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link d-flex text-white mx-3" href="./actions/logout.php">
              <i class="material-icons me-3">logout</i>
              <p class="my-auto">Logout</p>
            </a>
          </li>
          <?php endif; ?>
        </ul>

</div><!-- sidebar-container END -->