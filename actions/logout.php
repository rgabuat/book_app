<?php 
session_start();
session_unset();
session_destroy();

echo 'test';

header("location: ../admin.php");
?>
