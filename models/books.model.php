<?php 
// include('./dbconnect.php');
// include('./functions.php');


function createBook($conn,$author,$title,$price,$description,$fullpath)
{
    $sqlCreate = "INSERT INTO tbl_books (author,title,price,description,image_id,status) VALUES ('$author','$title','$price','$description','$fullpath','1');";
    $result = mysqli_query($conn,$sqlCreate);

    header("location: ../dashboard.php?page=books&create=success");
    exit();
}


function read()
{

}


function updateBook($conn,$id,$author,$title,$price,$description,$fullpath)
{
    $sqlUpdate = "UPDATE tbl_books SET author = '".$author."',title = '".$title."',price = '".$price."',description = '".$description."',image_ID'".$fullpath."' WHERE id='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=books&update=success");
    exit();

}

function deleteBook()
{

}


function countBooks($conn)
{
    $userCount = mysqli_query($conn,"SELECT * FROM tbl_books");
    $num_rows = mysqli_num_rows($userCount);
    echo $num_rows;
}



?>