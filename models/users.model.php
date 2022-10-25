<?php 

function updateaccount()
{
    $updateData = [
        'id' => $key,
        'bizName' => $bizName,
        'owner' => $owner,
        'email' => $email,
        'website' => $website,
        'contact' => $contact,
        'city' => $city,
        'province' => $province,
        'country' => $country,
    ];

    $ref_table = 'Shelters/'.$key;
    $updateQuery_result = $database->getReference($ref_table)->update($updateData);

    if($updateQuery_result) {
        $_SESSION['status'] = "Contact Updated Successfully";
        header('Location: .?/page=display-shelters');
    } else {
        $_SESSION['status'] = "Contact Not Updated";
        header('Location: index.php');
    }

    // $sqlUpdate = "UPDATE users_login SET fname = '".$fname."',lname = '".$lname."',email = '".$email."',dob = '".$dob."',contact = '".$contact."' ,username = '".$uname."' WHERE id ='".$id."';";
    // $result = mysqli_query($conn,$sqlUpdate);

    // header("location: ../dashboard.php?page=accounts&update=success");
    // exit();

}


function deleteAccount($conn,$id)
{   
    $sqlUpdate = "UPDATE users_login SET status = '1' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=accounts&delete=success");
    exit();
}

?>