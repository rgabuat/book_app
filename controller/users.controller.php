<?php 
session_start();
include('../dbconnect.php');
include('../functions.php');

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