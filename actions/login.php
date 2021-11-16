<?php 
require('../dbconnect.php');
require('../functions.php');

if(isset($_POST['submit']))
{
    $user_name = validate($_POST['admuser']);
    $user_pass = validate($_POST['admpass']);


    if(emptyLogin($user_name,$user_pass) !== false)
    {
        header("location: ../admin.php?error=emptyinput");
        exit();
    }

    loginUser($conn,$user_name,$user_pass);


}
else
{
    header("location: ./dashboard.php");
    exit();
}



?>