<?php 
// include ('includes/header.php');
?>

<div class="container">
    <div class="row justify-center">
        <div class="col-md-6">
            <?php
                if(isset($_SESSION['status'])) {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit & Update contact
                        <a href="index.php" class="btn btn-danger float-end"> BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                        include("dbconnect.php");

                        if (isset($_GET['username'])) {
                            $key_child = $_GET['username'];

                            $ref_table = "Shelters";
                            $getData = $database->getReference($ref_table)->getChild('-NFAKnKfWUWXaBkGVPG4')->getValue();

                            if ($getData > 0) {
                                ?>
                                
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="key" value="<?=$key_child;?>">
                                    <div class="form-group mb-3">
                                        <label for="">Business Name</label>
                                        <input type="text" name="bizName" value="<?=$getData['bizName'];?>" class="form-control">
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
                                        <label for="">Username</label>
                                        <input type="text" name="username" value="<?=$getData['username'];?>" class="form-control">
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

                                    <input type="hidden" value="<?=$_GET['username'];?>" name="user_auth">
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
                                    
                                    <div class="form-group mb-3">
                                        <button type="submit" name="update_contact" class="btn btn-primary">UPDATE</button>
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

                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="">
                
            </form>
        </div>
    </div>
</div>

<?php 
include ('includes/footer.php');
?>