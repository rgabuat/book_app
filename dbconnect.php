<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
    ->withServiceAccount('C:\xampp\htdocs\book_app\petnership-firebase-adminsdk-yftv6-ac39ee0b29.json')
    ->WithDatabaseUri('https://petnership-default-rtdb.asia-southeast1.firebasedatabase.app/');


$database = $factory->createDatabase();
$auth = $factory->createAuth();

?>

