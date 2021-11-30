<?php 
session_start();
include('../dbconnect.php');
include('../functions.php');
include('../models/users.model.php');

if(isset($_POST['submit']))
{
    
    if($_POST['action'] == "add")
    {
        $fname= mysqli_escape_string($conn,$_POST['fname']);
        // $mname = mysqli_escape_string($conn,$_POST['mname']);
        $lname = mysqli_escape_string($conn,$_POST['lname']);
        $uname = mysqli_escape_string($conn,$_POST['uname']);
        $password = mysqli_escape_string($conn,$_POST['password']);
        $passwordRepeat = mysqli_escape_string($conn,$_POST['passwordRepeat']); 
        $dob = mysqli_escape_string($conn,$_POST['dob']);
        $email = mysqli_escape_string($conn,$_POST['email']);
        $contact = mysqli_escape_string($conn,$_POST['contact']);
        

        if(emptyForm($fname,$lname,$uname,$password,$passwordRepeat,$dob,$email,$contact) !== false)
        {
            header("location:../register.php?error=emptyinput");
            exit();
        }

        if(invalidEmail($email) !== false)
        {
            header("location:../register.php?error=invalidemail");
            exit();
        }
        if(invalidUid($uname) !== false)
        {
            header("location:../register.php?error=invalidusername");
            exit();
        }

        if(pwdMath($password,$passwordRepeat) !== false)
        {
            header("location:../register.php?error=passworddontmatch");
            exit();
        }

        if(uidExits($conn,$uname,$email))
        {
            header("location:../register.php?error=usernameTaken");
            exit();
        }

        createUser($conn,$fname,$lname,$email,$dob,$contact,$uname,$password);

    }

    else if($_POST['action'] == "updateaccount")
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
            header("location:../dashboard.php?page=accounts&error=Email-is-not-valid");
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

        updateaccount($conn,$id,$fname,$lname,$email,$dob,$contact,$uname);

    }

    else if($_POST['action'] == "updateimg")
    {
        $img = 'uprofile';
        $id= mysqli_escape_string($conn,$_POST['pid']);
        $module = mysqli_escape_string($conn,$_POST['module']);
        updateImg($conn,$id,$img,$module);
    }
    
    else if($_POST['action'] == "delete")
    {
        $id = mysqli_escape_string($conn,$_POST['editId']);
        deleteAccount($conn,$id);
    }   


    // if($_POST['action'] == "login")
    // {
        
    //     if($_POST['admuser'] != "" && $_POST['admpass'] != "")
    //     {

            
    //         // if(mysqli_num_rows($result) > 0)
    //         // {
    //         //     foreach($result as $key)
    //         //     {
    //         //         print_r($key);
    //         //     }
    //         // }
    //     }
    // }

}
else
{
    header("location:./register.php");
    exit();
}



?>