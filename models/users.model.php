<?php 
// function createAccount($conn,$author,$action,$user,$module,$role)
// {
//     $sqlCreate = "INSERT INTO users_login (fname, lname, email, dob, contact, username, password, role, status, image) VALUES ('$user','1');";
//     $result = mysqli_query($conn,$sqlCreate);
// //     if (mysqli_multi_query($GLOBALS['db'], $sql)) {
// //     echo "New records created successfully";
// // } else {
// //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// // }
//     if($result)
//     {
//         $sqlLogs = "INSERT INTO tbl_logs (action,user,module,status,status_result,role) VALUES ('$action','$user','$module','success','true','$role');";
//         $result = mysqli_query($conn,$sqlLogs);
//         header("location: ../dashboard.php?page=authors&module=create&success=true");
//         exit();
//     }
//     else 
//     {
//         $sqlLogs = "INSERT INTO tbl_logs (action,user,module,status,status_result,role) VALUES ('$action','$user','$module','error','failed','$role');";
//         $result = mysqli_query($conn,$sqlLogs);
//         header("location: ../dashboard.php?page=authors&module=create&error=failed");
//         exit();
//     }
    
// }

// function fetch($conn,$id)
// {
//     $sqlFetch = "SELECT * FROM tbl_authors WHERE id= '".$id."';";
//     $result = mysqli_query($conn,$sqlFetch);

//     if(mysqli_num_rows($result) > 0 )
//     {
//         foreach($result as $key)
//         {
//             echo json_encode($key);
//         }
//     }
//     else 
//     {
//         echo 'No Data Found';
//     }

// }

function updateaccount($conn,$id,$fname,$lname,$email,$dob,$contact,$uname)
{
    $sqlUpdate = "UPDATE users_login SET fname = '$fname', lname = '$lname', email = '$email', dob = '$dob', contact = '$contact', uname = '$uname'  WHERE `users_login`.`id` = '".$id."';";

    // $sqlUpdate = "UPDATE users_login SET fname = '".$fname."',lname = '".$lname."',email = '".$email."',dob = '".$dob."',contact = '".$contact."' ,username = '".$uname."' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    print_r($result);

    echo $sqlUpdate;

    header("location: ../dashboard.php?page=accounts&update=success");
    exit();

}

if($_POST['action'] == "updateimg")
    {
        $img = 'uprofile';
        $id= mysqli_escape_string($conn,$_POST['pid']);
        updateImg($conn,$id,$img,);
    }

function deleteAccount($conn,$id)
{   
    $sqlUpdate = "UPDATE users_login SET status = '1' WHERE id ='".$id."';";
    $result = mysqli_query($conn,$sqlUpdate);

    header("location: ../dashboard.php?page=accounts&delete=success");
    exit();
}


// function countAuthors($conn)
// {
//     $userCount = mysqli_query($conn,"SELECT * FROM tbl_authors");
//     $num_rows = mysqli_num_rows($userCount);
//     echo $num_rows;
// }


?>