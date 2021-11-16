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
    $sql = "SELECT * FROM users_login WHERE username = ? OR email = ?;";
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


function createUser($conn,$email,$username,$password,$userlevel,$status)
{
    $sql = "INSERT INTO users_login (email,username,password,userlevel,status) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn); //initialize db connection //prepared statement

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("location: ./admin_add.php?error=dbstmtCreateFailed");
        exit();
    }

    $passwordHashed = password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sssss",$email,$username,$passwordHashed,$userlevel,$status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin.php");
    exit();

}


function loginUser($conn,$user_name,$user_pass)
{
    $uidExits = uidExits($conn,$user_name,$user_pass);
    if($uidExits == false)
    {
        header("location: ./admin.php?error=wronglogin");
        exit();
    }

        $passwordHashed = $uidExits['password'];
        $checkPwd = password_verify($user_pass,$passwordHashed);

        var_dump($passwordHashed);

        if($checkPwd === false)
        {
            header("location: ../admin.php?error=wrongpassword");
            exit();
        }
        else if($checkPwd === true)
        {
            session_start();
            $_SESSION['username'] = $uidExits['username'];
            $_SESSION['id'] = $uidExits['id'];
            $_SESSION['role'] = $uidExits['userlevel'];
            header("location: ../dashboard.php?success=ok&uid=".$_SESSION['username']);
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
        header("location: ./admin.php?error=invalidsession");
        $result = false;
        exit();
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



?>