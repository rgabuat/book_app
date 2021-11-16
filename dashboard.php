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

 <!-- Begin page -->
 <div class="wrapper">
        <div id="body-row">

            <!-- ============================================================== -->
            <!-- Start Sidebar Start -->
            <!-- ============================================================== -->
            
           
            <?php include('./templates/admin/left_sidebar.php'); ?>
           

            <!-- ============================================================== -->
            <!-- Start Sidebar end -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page main">
                <?php include('./templates/admin/content.php'); ?>
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <?php include('./templates/footer.php') ?>
        </div><!-- body-row END -->
        
</div>
</body>
</html>