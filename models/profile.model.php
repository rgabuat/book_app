<?php 

function updateprofile($conn,$id,$fname,$lname,$email,$dob,$contact,$uname)
{
    $sqlUpdate = "UPDATE users_login SET fname = '".$fname."',lname = '".$lname."',email = '".$email."',dob = '".$dob."',contact = '".$contact."' ,username = '".$uname."' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    print_r($result);

    echo $sqlUpdate;

    header("location: ../dashboard.php?page=profile&update=success");
    exit();

}

