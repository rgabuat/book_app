<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('./templates/head.php') ; 
require('./dbconnect.php'); 
include('./functions.php');
include('./models/authors.model.php');
include('./models/books.model.php');
include('./models/users.model.php');
is_logged_in();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

print_r($_SESSION);

if(!in_array($_GET['id'], $_SESSION['cart'])){
    array_push($_SESSION['cart'], $_GET['id']);
    $_SESSION['message'] = 'Product added to cart';
}

?>
</head>
<body>
    
</body>
</html>