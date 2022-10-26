<div class="container-fluid mt-5">
    <div class="row mb-5">
        <div class="col-12">
            <div  class="card bg-warning text-white">
                <div class="card-body" style="background-color: #3a7ca5 !important; border-radius: .5rem">
                    <h2 class="text-dark">Welcome Admin!<span class="text-white"></span></h2>
                    <span>My Profile</span>
                    <h2 class="card-text ">

                    </h2>
                </div>
            </div>
        </div>
    </div>
   <div class="row mb-3">
       <div class="col-lg-8 col-md-6 mb-3">
          <div  class="card bg-light text-white">
            <div class="card-body">
                <h3 class="card-title" style="color: #16425b;">User Details</h3>
                <p class="card-text ">
                    <?php 
                        $result = mysqli_query($conn,"SELECT * FROM users_login WHERE id='".$_SESSION['id']."'");
                        if(mysqli_num_rows($result) > 0 ):
                        foreach($result as $user):
                    ?>
                    <form action="./controller/profile.controller.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="updateprofile">
                        <input type="hidden" name="pid" value="<?= $user['id'] ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-outline my-3">
                                    <input type="text" id="" name="fname" value="<?= !empty($user['fname']) ? $user['fname'] : 'No data' ?>" class="form-control form-control-lg rounded-0" required />
                                    <label class="form-label" for="formControlLg">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline my-3">
                                    <input type="text" id="" name="lname" value="<?= !empty($user['lname']) ? $user['lname'] : 'No data' ?>" class="form-control form-control-lg rounded-0" required />
                                    <label class="form-label" for="formControlLg">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline my-3">
                                    <input type="text" id="" name="email" value="<?= !empty($user['email']) ? $user['email'] : 'No data' ?>" class="form-control form-control-lg rounded-0" required />
                                    <label class="form-label" for="formControlLg">Email</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline my-3">
                                    <input type="date" id="" name="dob" value="<?= !empty($user['dob']) ? $user['dob'] : 'No data' ?>" class="form-control form-control-lg rounded-0" required />
                                    <label class="form-label" for="formControlLg">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline my-3">
                                    <input type="text" id="" name="contact" value="<?= !empty($user['contact']) ? $user['contact'] : 'No data' ?>" class="form-control form-control-lg rounded-0" required />
                                    <label class="form-label" for="formControlLg">Contact no.</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-outline my-3">
                                    <input type="text" id="" name="uname" value="<?= !empty($user['username']) ? $user['username'] : 'No data' ?>" class="form-control form-control-lg rounded-0" required />
                                    <label class="form-label" for="formControlLg">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input style="background-color: #3a7ca5 !important; border-radius: .5rem !important" type="submit" name="submit" value="UPDATE DETAILS" class="btn btn-warning btn-lg w-lg-25 mt-lg-2 mt-md-5 mx-auto rounded-0 ">
                        </div>
                    </form>
                </p>
            </div>
        </div>
       </div>
       <div class="col-lg-4 col-md-6 mb-3" >
       <div  class="card bg-warning text-white">
            <div class="card-body" style="background-color: #3a7ca5 !important; border-radius: .5rem !important;">
                <div class="text-center" style="margin-top:-50px">
                    <img src="<?= !empty($user['image']) ? './uploads/'.$user['image'] : 'uploads/img_avatar.png' ?>" class="rounded-circle img-fluid" height="200" alt="" loading="lazy">
                    <div class="">
                        <button id="editprofile" class="btn btn-primary mt-3">UPDATE PICTURE</button>
                        <form id="profileform" action="./controller/profile.controller.php" method="post" enctype="multipart/form-data" class="d-none">
                            <input type="hidden" name="module" value="profile">
                            <input type="hidden" name="action" value="updateimg">
                            <input type="hidden" name="pid" value="<?=$user['id']; ?>">
                            <input type="file" id="file-input" name="uprofile" value="" class="form-control form-control-lg w-50 rounded-0 mt-3 mx-auto rounded" required/>
                            <input type="submit" class="w-50 btn btn-primary m-auto rounded-0 mt-3" name="submit" value="UPDATE PROFILE">
                        </form>
                    </div>
                </div>
                <h2 class="card-title text-center mt-3"><?= $user['username'];?></h2>
                <p class="card-text">Full Name: <?= ucfirst($user['fname'].' '.$user['lname']);?></p>
                <p class="card-text">Email: <?= $user['email'];?></p>
                <p class="card-text">
                    <?php 
                        
                        $dob_convert = strtotime($user['dob']);
                        $dob_converted = getDate($dob_convert);
                        echo 'Birthday: '.$dob_converted['month'].' '.$dob_converted['mday'].', '.$dob_converted['year'];
                    ?>
                </p>
                <p class="card-text">Contact number: 
                        <?= !empty($user['contact']) ? ucfirst($user['contact']) : 'No data' ?>
                </p>
            </div>
            </div>
       </div>
       <?php 
            endforeach;
            endif;
        ?>
   </div>
</div>
