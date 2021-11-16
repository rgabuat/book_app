<?php 
include('../dbconnect.php');
include('../functions.php');
require('../models/books.model.php');


if($_POST['action'] == "create")
{

    
    $author = mysqli_escape_string($conn,$_POST['author']);
    $title = mysqli_escape_string($conn,$_POST['title']);
    $price = mysqli_escape_string($conn,$_POST['price']);
    $description = mysqli_escape_string($conn,$_POST['description']);



    $upload_dir = '../uploads/';
    $file_name = $_FILES['profile']['name'];
    $file_tmp = $_FILES['profile']['tmp_name'];
    $file_type = $_FILES['profile']['type'];
    $file_size = $_FILES['profile']['size'];
    $file_error = $_FILES['profile']['error'];

    $file_ext = explode('.',$file_name);
    $fileActExt = strtolower(end($file_ext));
    
    if($file_error === 0)
    {
        $fileNewName = "book-"."$title".".".$fileActExt; 
        $fileDest = $upload_dir.$fileNewName;
        move_uploaded_file($file_tmp,$fileDest);
        $fullpath = $fileNewName;
    }

    createBook($conn,$author,$title,$price,$description,$fullpath);
}

if($_POST['action'] == "update")
{

    $uid = mysqli_escape_string($conn,$_POST['bid']);
    $uauthor = mysqli_escape_string($conn,$_POST['author']);
    $utitle = mysqli_escape_string($conn,$_POST['title']);
    $uprice = mysqli_escape_string($conn,$_POST['price']);
    $udescription = mysqli_escape_string($conn,$_POST['description']);

    $upload_dir = '../uploads/';
    $file_name = $_FILES['profile']['name'];
    $file_tmp = $_FILES['profile']['tmp_name'];
    $file_type = $_FILES['profile']['type'];
    $file_size = $_FILES['profile']['size'];
    $file_error = $_FILES['profile']['error'];

    $file_ext = explode('.',$file_name);
    $fileActExt = strtolower(end($file_ext));
    
    if($file_error === 0)
    {
        $fileNewName = "book-"."$utitle".".".$fileActExt; 
        $fileDest = $upload_dir.$fileNewName;
        move_uploaded_file($file_tmp,$fileDest);
        $fullpath = $fileNewName;
    }


    updateBook($conn,$uid,$uauthor,$utitle,$uprice,$udescription,$fullpath);
}


?>