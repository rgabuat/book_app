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
<h1 class="text-center mb-5 "><b>CART</b></h1>
<!-- book table -->
<?php if(isset($_GET['checkout']) && isset($_SESSION['err_message'])): ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
            <?=  $_SESSION['err_message']; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(!empty($_SESSION['cart'])): ?>
<form action="./controller/cart.controller.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="checkout">
<input type="hidden" name="uid" id="<?= isset($_SESSION['id']) ? $_SESSION['id'] : '' ?>">
<table class="table align-middle border">
  <thead class="text-center">
    <tr>
      <th scope="col">Book Cover</th>
      <th scope="col">Book Name</th>
      <th scope="col">Date Added</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
        <?php
            // $query = mysqli_query($conn,"SELECT tbl_books.title ,tbl_books.category ,tbl_books.image_id ,tbl_cart.bid ,tbl_cart.trans_date FROM tbl_cart JOIN tbl_books where tbl_cart.bid = tbl_books.id AND tbl_cart.status = 0 AND tbl_cart.uid = '".validate($_GET['id'])."';");
            if(!empty($_SESSION['cart'])):
            $query = mysqli_query($conn,"SELECT tbl_books.id,tbl_books.title ,tbl_books.category ,tbl_books.image_id FROM tbl_books WHERE tbl_books.id IN (".implode(',',$_SESSION['cart']).");");
            $order_id = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            if(mysqli_num_rows($query) > 0):
            foreach($query as $keys):
        ?>
            <tr>
                <td>
                    <?php $dir = './uploads/'; ?>
                    <img
                        src="<?= !empty($keys['image_id']) ? $dir.$keys['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail book_gallery" alt="Book image"
                        class="card-img-top"
                        alt="Book Img"
                        style="width:120px !important;height:120px !important; object-fit:cover;"
                    />
                </td>
                <td><?= $keys['title'] ?></td>
                <td><?= $keys['category'] ?></td>
                <?php
                    if(isset($_GET['bid']))
                    {
                        if(!in_array($_GET['bid'],$_SESSION['cart']))
                        {
                            $_SESSION['message'] = 'Not Found';
                        }
                        else 
                        {
                            $key = array_search($_GET['bid'], $_SESSION['cart']); 
                            unset($_SESSION['cart'][$key]);
                        }
                    }

                ?>
                <td><a href="./cart.php?bid=<?= $keys['id'] ?>" class="btn btn-danger rounded-0">&times; REMOVE</a></td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5"><p class="text-center my-auto">NO ITEMS ADDED</p></td>
            </tr>
        <?php endif; ?>
        <?php endif; ?>
  </tbody>
</table>
        <div class="row">
            <div class="col-12 text-center">
                 <input type="hidden" name="order_id" value="<php?= $order_id ?>"/>
                 <input type="hidden" name="order_acct" value="<php ?= $_SESSION['id']; ?>"/>
                <button type="submit" class="btn btn-lg rounded-0 text-white" style="background-color: #16425b;" name="checkout"><strong>CHECKOUT</strong></button>
            </div>
        </div>
</form>
<?php else: ?>
<div class="row">
    <div class="col-12 bg-light rounded-0 text-center">
        <h4 class="mt-3 mb-3">Cart is Empty!</h4>
        <a href="./" class="btn btn-lg rounded-.5 text-white mb-3" style="background-color: #16425b;">RETURN HOMEPAGE</a>
    </div>
   
</div>
<?php endif; ?>
</div>
<!-- <php include('./templates/footer.php') ; ?> -->
</body>
</html>