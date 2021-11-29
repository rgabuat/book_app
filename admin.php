<?php 
    include('./templates/head.php');
    include('./dbconnect.php');
    include('./functions.php');

    if(is_logged_in())
    {
      header('location:./dashboard.php');
    }

?>

<body> 
  <!-- <div class="container vh-100 d-flex align-items-center ">
    <div class="col-md-4 m-auto ">
      <form action="./actions/login.php" method="POST" class="shadow p-4 " enctype='multipart/form-data'>
      <input type="hidden" name="action" value="login">
      <h2 class="h2 text-center">LOG-IN FORM</h2>
      <div class="form-group">
      <label for="">Username:</label>
      <input type="text" name="admuser" class="form-control">
      </div>
      <div class="form-group  mb-4">
        <label for="">Password: </label>
        <input type="password" name="admpass" class="form-control">
      </div>
    <div class="form-group">
    <input type="submit" name="submit" value="LOGIN" class="form-control btn btn-success">
    </div>
    <div class="col-12">
        <div class="text-center">
        <a href="#"><span>&copy; Crix Brix</span></a>
        </div>
    </div>
    </form> 
    </div>
  </div> -->
  <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <a href="./">
                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/lotus.png" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                  </a>
                </div>

                <form action="./actions/login.php" method="POST" enctype='multipart/form-data'>
                  <input type="hidden" name="action" value="login">
                  <input type="hidden" name="module" value="login">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example11" name="admuser" class="form-control form-control-lg" placeholder="Phone number or email address"/>
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                  <input type="password" id="form1Example13" name="admpass" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example13">Password</label>
                </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input type="submit" name="submit" value="LOGIN" class="btn btn-success btn-lg btn-block fa-lg gradient-custom-2 mb-3 rounded-0">
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="./register.php" class="btn btn-outline-danger me-3">Sign up for free</a>
                    <!-- <button type="button" class="btn btn-outline-danger">Create new</button> -->
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include('./templates/footer.php') ; 
?>
</body>
</html>