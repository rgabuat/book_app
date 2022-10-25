<?php 
session_start();
include('../dbconnect.php');
include('../functions.php');
include('../models/users.model.php');



if(isset($_POST['update_user']))
{
    $uid = $_POST['uid'];
    $display_name = $_POST['display_name'];
    $phone = $_POST['phone'];

    $params = [
        'displayName' => $display_name,
        'phoneNUmber' => $phone
    ];
    
    $user_updated = $auth->updateUser($uid,$params);

    if($user_updated)
    {
        header("location: ../dashboard.php?page=accountedit&id=".$uid."&status=success");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=accountedit&id=".$uid."&status=error");
        exit();
    }

}

if(isset($_POST['delete_user']))
{
    $uid = $_POST['uid'];

  
    $user_deleted = $auth->deleteUser($uid);

    if($user_deleted)
    {
        header("location: ../dashboard.php?page=accounts&status=Deleted Successfully");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=accounts&status=Unsuccessfull");
        exit();
    }

}

if(isset($_POST['enable_user']))
{
    $uid = $_POST['uid'];
    $udpated_user = $auth->enableUser($uid);

    if($udpated_user)
    {
        header("location: ../dashboard.php?page=accounts&status=User Updated Successfully");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=accounts&status=Update Unsuccessfull");
        exit();
    }

}

if(isset($_POST['disable_user']))
{
    $uid = $_POST['uid'];
    $udpated_user = $auth->disableUser($uid);

    if($udpated_user)
    {
        header("location: ../dashboard.php?page=accounts&status=User Updated Successfully");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=accounts&status=Update Unsuccessfull");
        exit();
    }
    
}

if(isset($_POST['change_password']))
{

    $uid = $_POST['uid'];
    $new_password = $_POST['new_password'];
    $confirm_pasword = $_POST['retype_new_password'];
    if($confirm_pasword != $new_password)
    {
        header("location: ../dashboard.php?page=accounts&error=Password not match");
        exit();
    }
    else 
    {
        $udpated_user = $auth->changeUserPassword($uid,$new_password);

        if($udpated_user)
        {
            header("location: ../dashboard.php?page=accounts&success=Password Updated");
            exit();
        }
        else 
        {
            header("location: ../dashboard.php?page=accounts&success=password not udpated error");
            exit();
        }
        
    }
    
}


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

    else if($_POST['action'] == "updateaccount") {
        $key = $_POST['key'];
        $bizName = $_POST['bizName'];
        $owner = $_POST['owner'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $country = $_POST['country'];
        

        

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