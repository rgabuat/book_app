<!DOCTYPE html>
<html lang="en">
<?php 
include('./templates/head.php') ;
require('./dbconnect.php'); 
include('./functions.php');
include('./models/authors.model.php');
include('./models/books.model.php');
include('./models/users.model.php');
if(!is_logged_in())
{
    header("location: ./admin.php?error=invalidsession");   
};
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
            <?php require('errors.php'); ?>
                <?php include('./templates/admin/content.php'); ?>
                
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

          
        </div><!-- body-row END -->
        
</div>

<?php include('./templates/footer.php');?>
</body>
</html>