<?php include('./templates/head.php');?>
<body> 
  <div class="container vh-100 d-flex align-items-center ">
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
  </div>
</body>
</html>