<?php 
function createAuthor($conn,$author)
{
    $sqlCreate = "INSERT INTO tbl_authors (name,status) VALUES ('$author','1');";
    $result = mysqli_query($conn,$sqlCreate);

    header("location: ../dashboard.php?page=authors&create=success");
    exit();
}

function fetch($conn,$id)
{
    $sqlFetch = "SELECT * FROM tbl_authors WHERE id= '".$id."';";
    $result = mysqli_query($conn,$sqlFetch);

    if(mysqli_num_rows($result) > 0 )
    {
        foreach($result as $key)
        {
            echo json_encode($key);
        }
    }
    else 
    {
        echo 'No Data Found';
    }

}

function updateAuthor($conn,$id,$name)
{
    $sqlUpdate = "UPDATE tbl_authors SET name = '".$name."' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=authors&update=success");
    exit();
}

function deleteAuthor($conn,$id)
{   
    $sqlUpdate = "UPDATE tbl_authors SET status = '0' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=authors&delete=success");
    exit();
}


function countAuthors($conn)
{
    $userCount = mysqli_query($conn,"SELECT * FROM tbl_authors");
    $num_rows = mysqli_num_rows($userCount);
    echo $num_rows;
}


?>