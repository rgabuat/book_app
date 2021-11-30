<?php 
function emptyForm($email,$username,$password,$passwordRepeat,$userlevel,$status)
{
    $result;
    if(empty($email) || empty($username) || empty($password) || empty($userlevel) || empty($status))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}

function emptyLogin($user_name,$user_pass)
{
    $result;
    if(empty($user_name) || empty($user_pass))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if(!preg_match("/^[a-zA-Z0-1]*$/",$username))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}

function pwdMath($password , $passwordRepeat)
{
   
    $result;
    if($password !== $passwordRepeat)
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
}

function uidExits($conn,$username,$email)
{
    $sql = "SELECT users_login.id,fname,lname,email,dob,contact,username,password, tbl_roles.role_level as userlevel FROM users_login JOIN tbl_roles ON users_login.role = tbl_roles.id WHERE username = ? OR email = ?;";
    // $sql = "SELECT * FROM users_login  WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn); //initialize db connection //prepared statement

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ./admin_add.php?error=dbstmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else 
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn,$fname,$lname,$email,$dob,$contact,$username,$password)
{
    $sql = "INSERT INTO users_login (fname,lname,email,dob,contact,username,password) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn); //initialize db connection //prepared statement

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ./admin_add.php?error=dbstmtCreateFailed");
        exit();
    }

    $passwordHashed = password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssssss",$fname,$lname,$email,$dob,$contact,$username,$passwordHashed);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?create=success");
    exit();

}


function loginUser($conn,$user_name,$user_pass,$action,$module)
{
    

    $uidExits = uidExits($conn,$user_name,$user_pass);
        if($uidExits == false)
        {
            $stats = array("status" => "error","result" => "user not exists","role" => "0");
            header("location: ../admin.php?".$stats['status']."=".$stats['result']."");
            userlog($conn,$action,$user_name,$module,$stats['status'],$stats['result'],$stats['role']);
            exit();
        }
        
        $passwordHashed = $uidExits['password'];
        $checkPwd = password_verify($user_pass,$passwordHashed);

        if($checkPwd === false)
        {
            $stats = array("status" => "error","result" => "wrong password","role" => "0");
            header("location: ../admin.php?'".$stats['status']."'='".$stats['result']."'");
            userlog($conn,$action,$user_name,$module,$stats['status'],$stats['result'],$stats['role']);
            exit();
        }
        else if($checkPwd === true)
        {
            session_start();
            $_SESSION['username'] = $uidExits['username'];
            $_SESSION['id'] = $uidExits['id'];
            $_SESSION['role'] = $uidExits['userlevel'];
            $stats = array("status" => "success","result" => "logged in","role" => $uidExits['userlevel']);
            header("location: ../dashboard.php?'".trim($stats['status'])."'='".$stats['result']."'&uid='".$_SESSION['username']."'");
            userlog($conn,$action,$user_name,$module,$stats['status'],$stats['result'],$stats['role']);
            exit();
        }
    }

    function is_logged_in()
    {
        session_start();
        $result;
        if(isset($_SESSION['username']) && isset($_SESSION['id']))
        {
            $result = true;
        }
        else 
        {
            $result = false;
        }
        return $result;

    }

    function emptyPass($password,$newpass,$newpassrepeat) 
    {
    $result;
    if(empty($password) || empty($newpass) || empty($newpassrepeat))
    {
        $result = true;
    }
    else 
    {
        $result = false;
    }
    return $result;
    }


    function validatePass($conn,$uid,$password)
    {

        $uidExists = uidExits($conn,$uid,$password);
        $result;
        if($uidExists === false)
        {
            header("locaion: ./admin.php?error=wronglogin");
            exit();
        }

        $passwordHashed = $uidExists['password'];
        $checkPwd = password_verify($password,$passwordHashed);

        if($checkPwd === false)
        {
            $result = true;
        }
        else 
        {
            $result = false;
        }
        return $result;
    }

    function sameCurrpass($password,$newpass)
    {
        $result;
        if($password === $newpass)
        {
            $result = true;
            
        }
        else 
        {
            $result = false;
        }
        return $result;
    }

    function updateUser($conn,$uid,$newpass,$fullpath)
    {
        $passhash = password_hash($newpass,PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE users_login SET password  = '".$passhash."', image = '".$fullpath."' WHERE username = '".$uid."';";
        $result = mysqli_query($conn,$sqlUpdate);

        print_r($fullpath);
        print_r($sqlUpdate);


        header("location: ./index.php?uid=$uid&sucess=ok");
        exit();
    }

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function base_url()
    {
        $basename = explode('/', $_SERVER['REQUEST_URI']);
        echo $basename[1].'/uploads';
    }

    function countUsers($conn)
    {
        $userCount = mysqli_query($conn,"SELECT * FROM users_login");
        $num_rows = mysqli_num_rows($userCount);
        echo $num_rows;
    }

    function countBooksBorrowed($conn)
    {
        $borrowedCount = mysqli_query($conn,"SELECT COUNT(tbl_orderdetails.ords_id) as bcount FROM tbl_orderdetails");

        // $num_rows = mysqli_num_rows($borrowedCount);
        foreach($borrowedCount as $bcount)
        {
            echo $bcount['bcount'];   
        }
        // return $count;
    }


    // logs
    function userlog($conn,$action,$user_name,$module,$status,$result,$role)
    {
        $sqlLogs = "INSERT INTO tbl_logs (action,user,module,status,status_result,role) VALUES ('$action','$user_name','$module','$status','$result','$role');";
        $result = mysqli_query($conn,$sqlLogs);
    }

    function createBooklog()
    {
        $sqlLogs = "INSERT INTO tbl_logs (action,user,status,status_result,role) VALUES ('$action','$user_name','$status','$result','$role');";
        $result = mysqli_query($conn,$sqlLogs);
    }


    function updateImg($conn,$id,$img,$module)
    {
        $upload_dir = '../uploads/';
        $data = array(
            'file_name' => $_FILES[$img]['name'],
            'file_tmp' => $_FILES[$img]['tmp_name'],
            'file_type' => $_FILES[$img]['type'],
            'file_size' => $_FILES[$img]['size'],
            'file_error' => $_FILES[$img]['error'],
        );

        $file_ext = explode('.',$data['file_name']);
        $fileActExt = strtolower(end($file_ext));
        
        if($data['file_error'] === 0)
        {
            $imgid = rand();
            $fileNewName = $id."-"."$imgid".".".$fileActExt; 
            $fileDest = $upload_dir.$fileNewName;
            move_uploaded_file($data['file_tmp'],$fileDest);
            $fullpath = $fileNewName;
            echo $fileNewName;
        }

        $sqlUpdate = "UPDATE users_login SET image = '".$fileNewName."' WHERE id ='".$id."';";
        $result = mysqli_query($conn,$sqlUpdate);


            header("location: ../dashboard.php?page=".$module."&update=success");
   
        exit();
        
    }

?>