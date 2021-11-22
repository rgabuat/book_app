<!DOCTYPE html>
<html lang="en">
<?php
include('./templates/head.php') ; 
require('./dbconnect.php'); 
include('./functions.php');
include('./models/authors.model.php');
include('./models/books.model.php');
include('./models/users.model.php');
is_logged_in();
?>
<body>
<!-- headers -->
<?php include('./templates/user/navbar.php');?>

<!-- content -->
<div class="container my-5 pt-5">
    <h1 class="mb-5 "><b>Order Received</b></h1>
    <p>Thank you. Your order has been received.</p>
    <?php 
        if(isset($_GET['order']) && isset($_GET['order_id'])): 
        if($_GET['order'] == 'success'):
        $query = mysqli_query($conn,"SELECT (SELECT count(tbl_orderdetails.ords_id)) as cnt, tbl_orderdetails.ords_id,tbl_orderdetails.ord_lid,tbl_orders.date, tbl_orders.ord_id,tbl_books.title,tbl_books.id FROM tbl_orders JOIN tbl_orderdetails ON tbl_orders.id = tbl_orderdetails.ords_id JOIN tbl_books ON tbl_orderdetails.ords_id = tbl_books.id WHERE tbl_orderdetails.ord_lid = ".$_GET['order_id']." GROUP BY tbl_orderdetails.ords_id");
        if(mysqli_num_rows($query) > 0):

    ?>
    <p><b>Order ID: </b><?= $_GET['order_id'] ?></p>
    <p class="mb-5"><b>Date:</b><?= date("F d, Y h:i:s A") ?></p>
    <h2><b>Order Details</b></h2>
    <table class="table">
        <thead>
            <tr>
                <th>Book</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        <?php 

            foreach($query as $keys):
        ?>
            <tr>
                <td><a href="./bookview.php?id=<?= $keys['id']?>"><?= $keys['title']; ?></a></td>
                <td>&times; <?= $keys['cnt']; ?></td>
            </tr>
        <?php   
            endforeach; 
            endif;
        ?>
        </tbody>
    </table>
    <p></p>
    <?php
    endif;
    endif;
    ?>
</div>
<?php
include('./templates/footer.php') ; 
?>
</body>
</html>