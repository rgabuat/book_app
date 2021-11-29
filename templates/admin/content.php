
 <div  class="container-fluid">
 <?php include('topbar.php'); ?>
 
 <!-- page contents -->
 <?php 
 
 $dir = 'pages/';
 $page = isset($_GET['page']) ? $_GET['page'] : 'home';

if(file_exists($dir.$page.'.php'))
{
    // echo $dir.$page.'.php';
    require_once($dir.$page.'.php');
}
else 
{
    require_once($dir.'404.php');
}

?>

 </div>