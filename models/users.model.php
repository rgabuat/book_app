<?php 

function updateaccount($conn,$id,$fname,$lname,$email,$dob,$contact,$uname)
{
 
    $sqlUpdate = "UPDATE users_login SET fname = '".$fname."',lname = '".$lname."',email = '".$email."',dob = '".$dob."',contact = '".$contact."' ,username = '".$uname."' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=accounts&update=success");
    exit();

}


function deleteAccount($conn,$id)
{   
    $sqlUpdate = "UPDATE users_login SET status = '1' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=accounts&delete=success");
    exit();
}

?>