<?php 
include('../dbconnect.php');
include('../functions.php');
require('../models/authors.model.php');
is_logged_in();


if($_POST['action'] == "create")
{
    $author = mysqli_escape_string($conn,$_POST['author']);
    $action = mysqli_escape_string($conn,$_POST['action']);
    $user = $_SESSION['username'];
    $role = $_SESSION['role'];
    $module = 'Author';
    createAuthor($conn,$author,$action,$user,$module,$role);
}
else if($_POST['action'] == "edit")
{
    $id = mysqli_escape_string($conn,$_POST['id']);
    fetch($conn,$id);
    
}

else if($_POST['action'] == "update")
{
    $id = mysqli_escape_string($conn,$_POST['editId']);
    $updatedAuthor = mysqli_escape_string($conn,$_POST['author']);
    updateAuthor($conn,$id,$updatedAuthor);
}

else if($_POST['action'] == "delete")
{
    $id = mysqli_escape_string($conn,$_POST['editId']);
    deleteAuthor($conn,$id);
}


?>