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
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if($_GET['add'] == 'success')
{
    if(!in_array($_GET['id'], $_SESSION['cart'])){
        array_push($_SESSION['cart'], $_GET['id']);
        $_SESSION['message'] = 'Book successfully added to cart';
    }
    else 
    {
        $_SESSION['message'] = 'Book is already added on Cart';
        header("location:./bookview.php?id=".$_GET['id']."&add=failed");
    }
}
?>
<body>
<!-- headers -->
<?php include('./templates/user/headers.php');?>
<div class="container mt-3">
    <div class="row">
    <?php 
    if(isset($_GET['id'])):
    $result = mysqli_query($conn,"SELECT tbl_books.id,tbl_books.title,tbl_books.price,tbl_books.description,tbl_books.image_id ,tbl_authors.name as author FROM tbl_books JOIN tbl_authors WHERE tbl_books.author = tbl_authors.id AND tbl_books.id = '".validate($_GET['id'])."';");
    if (mysqli_num_rows($result) > 0) :
    foreach($result as $keys): ?>
    <div class="container my-5">
        <?php if(isset($_SESSION['message']) && isset($_GET['add'])): ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert <?php isset($_GET['add']);  echo $_GET['add'] == 'success' ? 'alert-success' : 'alert-danger' ?>" role="alert">
                    <?= $_SESSION['message']; ?>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="row mb-5">
            
            <div class="col-md-6">
            <?php $dir = './uploads/'; ?>
            <img
                src="<?= !empty($keys['image_id']) ? $dir.$keys['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail book_gallery" alt="Book image"
                class="card-img-top"
                alt="Book Image";
            />
            </div>
            <div class="col-md-6">
                <h1 class="book_title mb-2"><b><?= ucwords($keys['title']) ?></b></h1>
                <!-- <p class="book_status" style="font-size:24px"><b>Test</b></p> -->
                <p class="book_description mb-4"><?=ucwords($keys['description']); ?></p>
                <a href="./bookview.php?id=<?= $_GET['id']; ?>&add=success" class="btn btn-dark p-3 rounded-0 w-lg-100 w-md-50" ><strong>ADD BOOK TO CART</strong></a>
                <!-- <form action="./controller/cart.controller.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="uid" value="<?= $_SESSION['id'] ?>">
                    <button type="submit" name="cart" class="btn btn-dark p-3 rounded-0 w-25" value="<?= $keys['id']; ?>"><strong>ADD TO CART</strong></button>
                </form> -->
                <hr>
                <php print_r($_SESSION); ?>
                <!-- <p class="book_category mt-3"><span>CATEGORY:</span> Romance</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Tabs navs -->
                    <!-- <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a
                        class="nav-link active"
                        id="ex3-tab-1"
                        data-mdb-toggle="tab"
                        href="#ex3-tabs-1"
                        role="tab"
                        aria-controls="ex3-tabs-1"
                        aria-selected="true"
                        >Link</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                        class="nav-link"
                        id="ex3-tab-2"
                        data-mdb-toggle="tab"
                        href="#ex3-tabs-2"
                        role="tab"
                        aria-controls="ex3-tabs-2"
                        aria-selected="false"
                        >Very very very very long link</a
                        >
                    </li>
                    </ul> -->
                    <!-- Tabs navs -->

                    <!-- Tabs content -->
                    <!-- <div class="tab-content" id="ex2-content">
                    <div
                        class="tab-pane fade show active"
                        id="ex3-tabs-1"
                        role="tabpanel"
                        aria-labelledby="ex3-tab-1"
                    >
                        <?= $keys['description'] ?>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="ex3-tabs-2"
                        role="tabpanel"
                        aria-labelledby="ex3-tab-2"
                    >
                        Tab 2 content
                    </div>
                    </div> -->
        <!-- Tabs content -->
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>book not found</p>
    <?php endif; ?>
    <?php else: ?>
        <p class="text-center">book not found</p>    
    <?php  endif;?>
    </div>
</div>
<?php include('./templates/footer.php');?>  
</body>
</html>