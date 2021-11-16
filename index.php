<!DOCTYPE html>
<html lang="en">
<?php
include('./templates/head.php') ; 
require('./dbconnect.php'); 
include('./functions.php');
include('./models/authors.model.php');
include('./models/books.model.php');
include('./models/users.model.php');
?>
<body>
<!-- headers -->
<?php include('./templates/user/headers.php');?>

<!-- content -->
<?php include('./templates/user/content.php'); ?>

<?php
include('./templates/footer.php') ; 
?>
</body>
</html>