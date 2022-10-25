

<div class="container-fluid mt-5">
    <div class="row mb-5">
        <!-- <div class="col-12">
            <div  class="card bg-warning text-white">
                <div class="card-body" style="background-color: #3a7ca5 !important; border-radius: .5rem">
                    <h2 class="text-dark">Welcome <span class="text-white"><= ucwords($_SESSION['username']);?></span></h2>
                    <span>My Profile</span>
                    <h2 class="card-text ">

                    </h2>
                </div>
            </div>
        </div> -->
    </div>
   <div class="row mb-3">
       <div class="col-lg-8 col-md-6 mb-3">
          <div  class="card bg-light text-white">
            <div class="card-body">
                <h3 class="card-title" style="color: #16425b;">Shelter Details</h3>
                <p class="card-text ">
                <?php
                        include("dbconnect.php");

                        if (isset($_GET['id'])) {
                            $key_child = $_GET['id'];

                            $ref_table = "Shelters";
                            $getData = $database->getReference($ref_table)->getChild($key_child)->getValue();

                            if ($getData > 0) {
                                ?>
                                
                                <form action="./controller/users.controller.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="updateaccount">
                                    <div class="form-group mb-3">
                                        <label for="">Business Name</label>
                                        <input type="text" name="bizName" value="<?=$getData['bizName'];?>" class="form-control form-control-lg rounded-0" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Owner Name</label>
                                        <input type="text" name="owner" value="<?=$getData['owner'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" value="<?=$getData['email'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Website</label>
                                        <input type="text" name="website" value="<?=$getData['website'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Contact Number</label>
                                        <input type="number" name="contact" value="<?=$getData['contact'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Street Address</label>
                                        <input type="text" name="street" value="<?=$getData['street'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">City</label>
                                        <input type="text" name="city" value="<?=$getData['city'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Province</label>
                                        <input type="text" name="province" value="<?=$getData['province'];?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Country</label>
                                        <input type="text" name="country" value="<?=$getData['country'];?>" class="form-control">
                                    </div>

                                    <input type="hidden" value="<?=$_GET['id'];?>" name="user_auth">
                                    <div class="input-group mb-3">
                                        <label for="">Enable or Disable account</label>
                                        <select name="select_user_auth" class="form-control" required>
                                            <option value=""></option>
                                            <option value="disable">Disable</option>
                                            <option value="enable">Enable</option>
                                        </select>
                                    <button type="submit" name="enable_disable_user_ac" class="input-group-text btn btn-primary">
                                    Submit
                                    </button>
                                    </div>
                                    
                                    <div class="row">
                                        <input style="background-color: #3a7ca5 !important; border-radius: .5rem !important" type="submit" name="submit" value="UPDATE DETAILS" class="btn btn-warning btn-lg w-lg-25 mt-lg-2 mt-md-5 mx-auto rounded-0 ">
                                     </div>
                                </form>

                                <?php

                            } else {
                                $_SESSION['status'] = "Invalid ID";
                                header("Location: index.php");
                                exit();
                            }
                        } else {
                            $_SESSION['status'] = "No Record Found";
                            header("Location: index.php");
                            exit();
                        }
                    ?>
                </p>
            </div>
        </div>
       </div>
       <!-- <div class="col-lg-4 col-md-6 mb-3" >
       <div  class="card bg-warning text-white">
            <div class="card-body" style="background-color: #3a7ca5 !important; border-radius: .5rem !important;">
                <div class="text-center" style="margin-top:-50px">
                    <img src="<?= !empty($user['image']) ? './uploads/'.$user['image'] : 'uploads/img_avatar.png' ?>" class="rounded-circle img-fluid" height="200" alt="" loading="lazy">
                    <div class="">
                        <button id="editprofile" class="btn btn-primary mt-3">UPDATE PICTURE</button>
                        <form id="profileform" action="./controller/users.controller.php" method="post" enctype="multipart/form-data" class="d-none">
                            <input type="hidden" name="module" value="accounts">
                            <input type="hidden" name="action" value="updateimg">
                            <input type="hidden" name="pid" value="<?=$user['id']; ?>">
                            <input type="file" id="file-input" name="uprofile" value="" class="form-control form-control-lg w-50 rounded-0 mt-3 mx-auto rounded" required/>
                            <input type="submit" class="w-50 btn btn-primary m-auto rounded-0 mt-3" name="submit" value="UPDATE PROFILE">
                        </form>
                    </div>
                </div>
                <h2 class="card-title text-center mt-3"><?= $user['username'];?></h2>
                <p class="card-text">Shelter Name: <?= ucfirst($user['fname'].' '.$user['lname']);?></p>
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
            </div> -->
       </div>

   </div>
</div>
