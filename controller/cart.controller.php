<?php 
include('../dbconnect.php');
include('../functions.php');
require('../models/cart.model.php');
session_start();

$ord_id= mysqli_escape_string($conn,$_POST['order_id']);
$ord_acct = mysqli_escape_string($conn,$_POST['order_acct']);

    insert_order($conn,$ord_id,$ord_acct);

$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
$orderslasid = mysqli_insert_id($conn);

foreach($cart as $value)
{
    insert_order_deatils($conn,$orderslasid,$value);
}

unset($_SESSION['cart']);


// $ordersid = mysqli_insert_id($conn);

// if(book_added($conn,$uid,$bid) !== false)
// {
//     header("location: ../bookview.php?id=".$bid."&add_to_cart=false");
//     exit();
// }

//     add_to_cart($conn,$uid,$bid);



?>