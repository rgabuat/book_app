<div class="container mt-5">
<?php if(isset($_GET['error'])):
        if($_GET['error']==="Email-is-not-valid"): ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        You have entered an invalid email!
    </div>

    <?php elseif($_GET['error']==="emptyinput"): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Empty input!
        </div>

    <?php elseif($_GET['error']==="invalidusername"): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            You have entered an invalid username!
        </div>

    <?php elseif($_GET['error']==="passworddontmatch"): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           Passwords do not match!
        </div>    

    <?php elseif($_GET['error']==="usernameTaken"): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           Username taken!
        </div>

<?php
    endif;
    endif;
?>

<?php if(isset($_GET['update'])):
        if($_GET['update']==="sucess"): ?>

    <div class="alert alert-sucess alert-dismissible fade show" role="alert">
        Profile updated successfully!
    </div>

<?php
    endif;
    endif;
?>
</div>