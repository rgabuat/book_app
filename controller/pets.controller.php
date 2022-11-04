<?php 
session_start();
include('../dbconnect.php');
include('../functions.php');

if ($pet->data == 1 ? "High" : ($pet->data == 2 ? "Medium": ($pet->data == 3 ? "Low": "No data found")))

if(isset($_POST['update_cat']))
{
    $uid = $_POST['cid'];
    $petAge = $_POST['petAge'];
    $petAgeDD = $_POST['petAgeDD'];
    $petAgeNum = $_POST['petAgeNum'];
    $petDesc = $_POST['petDesc'];
    $petID = $_POST['petID'];
    $petName = $_POST['petName'];
    $petSex = $_POST['petSex'];
    // $petType = $_POST['petType'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $shelter = $_POST['shelter'];

    $params = [
        'petAge' => $petAge,
        'petAgeDD' => $petAgeDD,
        'petAgeNum' => $petAgeNum,
        'petDesc' => $petDesc,
        'petName' => $petName,
        'petSex' => $petSex,
        'q1' => $q1,
        'q2' => $q2,
        'q3' => $q3,
        'q4' => $q4,
        'q5' => $q5,
        'q6' => $q6,
        'q7' => $q7,
        'q8' => $q8,
        'q9' => $q9,
        'shelter' => $shelter,
    ];

    $ref_table = 'Pets/Cats/'.$uid;
    
    $pet_updated = $database->getReference($ref_table)->update($params);

    if($pet_updated)
    {
        header("location: ../dashboard.php?page=display-cats&id=".$uid."&action=update&status=success");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=display-cats&id=".$uid."&action=update&status=error");
        exit();
    }

}

if(isset($_POST['delete_cat']))
{
    $uid = $_POST['cid'];

    $ref_table = 'Pets/Cats/'.$uid;
    
    $pet_deleted = $database->getReference($ref_table)->remove();

    if($pet_deleted)
    {
        header("location: ../dashboard.php?page=display-cats&id=".$uid."&action=delete&status=success");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=display-cats&id=".$uid."&action=delete&status=error");
        exit();
    }

}


//dogs 

if(isset($_POST['update_dog']))
{
    $uid = $_POST['cid'];
    $petAge = $_POST['petAge'];
    $petAgeDD = $_POST['petAgeDD'];
    $petAgeNum = $_POST['petAgeNum'];
    $petDesc = $_POST['petDesc'];
    $petID = $_POST['petID'];
    $petName = $_POST['petName'];
    $petSex = $_POST['petSex'];
    // $petType = $_POST['petType'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $shelter = $_POST['shelter'];

    $params = [
        'petAge' => $petAge,
        'petAgeDD' => $petAgeDD,
        'petAgeNum' => $petAgeNum,
        'petDesc' => $petDesc,
        'petName' => $petName,
        'petSex' => $petSex,
        'q1' => $q1,
        'q2' => $q2,
        'q3' => $q3,
        'q4' => $q4,
        'q5' => $q5,
        'q6' => $q6,
        'q7' => $q7,
        'q8' => $q8,
        'q9' => $q9,
        'shelter' => $shelter,
    ];

    $ref_table = 'Pets/Dogs/'.$uid;
    
    $pet_updated = $database->getReference($ref_table)->update($params);

    if($pet_updated)
    {
        header("location: ../dashboard.php?page=display-dogs&id=".$uid."&action=update&status=success");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=display-dogs&id=".$uid."&action=update&status=error");
        exit();
    }

}

if(isset($_POST['delete_dog']))
{
    $uid = $_POST['cid'];

    $ref_table = 'Pets/Dogs/'.$uid;
    
    $pet_deleted = $database->getReference($ref_table)->remove();

    if($pet_deleted)
    {
        header("location: ../dashboard.php?page=display-dogs&id=".$uid."&action=delete&status=success");
        exit();
    }
    else 
    {
        header("location: ../dashboard.php?page=display-dogs&id=".$uid."&action=delete&status=error");
        exit();
    }

}

?>