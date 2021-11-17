<?php 
require('../dbconnect.php');
require('../functions.php');
session_start();

$stats = array("username" => $_SESSION['username'],"status" => "success","result" => "logged out","roles" => $_SESSION['role'], "action" => "logout","module" => "Login");
userlog($conn,$stats['action'],$stats['username'],$stats['module'],$stats['status'],$stats['result'],$stats['roles']);

session_unset();
session_destroy();
header("location: ../admin.php");

?>
