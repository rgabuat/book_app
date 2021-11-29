<?php 
session_start();
include('../dbconnect.php');
include('../functions.php');
require('../models/profile.model.php');

if(isset($_POST['submit']))
{
    
    if($_POST['action'] == "updateprofile")
    {
        $id= mysqli_escape_string($conn,$_POST['pid']);
        $fname= mysqli_escape_string($conn,$_POST['fname']);
        $lname = mysqli_escape_string($conn,$_POST['lname']);
        $uname = mysqli_escape_string($conn,$_POST['uname']);
        $dob = mysqli_escape_string($conn,$_POST['dob']);
        $email = mysqli_escape_string($conn,$_POST['email']);
        $contact = mysqli_escape_string($conn,$_POST['contact']);

        // if(emptyForm($fname,$lname,$uname,$password,$passwordRepeat,$dob,$email,$contact) !== false)
        // {
        //     header("location:../register.php?error=emptyinput");
        //     exit();
        // }

        if(invalidEmail($email) !== false)
        {
            header("location:../dashboard.php?page=profile&error=Email is not valid");
            exit();
        }
        // if(invalidUid($uname) !== false)
        // {
        //     header("location:../register.php?error=invalidusername");
        //     exit();
        // }

        // if(pwdMath($password,$passwordRepeat) !== false)
        // {
        //     header("location:../register.php?error=passworddontmatch");
        //     exit();
        // }

        // if(uidExits($conn,$uname,$email))
        // {
        //     header("location:../dashboard.php?page=profile&error=Email is already registered");
        //     exit();
        // }

        updateprofile($conn,$id,$fname,$lname,$email,$dob,$contact,$uname);

    }

    if($_POST['action'] == "updateimg")
    {
        $img = 'uprofile';
        $id= mysqli_escape_string($conn,$_POST['pid']);
        updateImg($conn,$id,$img,);
    }
}
else
{
    header("location:./register.php");
    exit();
}


?>