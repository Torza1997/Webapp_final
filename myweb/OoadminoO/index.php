<?php 
  session_start();
  if($_SESSION['@_$ADDS_USERNAME'] != '' and $_SESSION['status_@_admin'] == 9){

  }else{
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Include/css/bootstrap.min.css">
    <link rel="stylesheet" href="Include/css/admin_css.css">
    <link href="Include/css/fonts.css" rel="stylesheet">
    <link rel="shortcut icon" href="/Include/images/logo.png" />
     <script src="Include/js/2717a8ba5c.js" crossorigin="anonymous"></script>
    <title>TORTAIR COFFEE STORE ADMAIN</title>
</head>
<body>
  <?php 
      include "admin_nav.php";
  ?>
  <div class="container" id ="load_nav2">
    
  </div>
<div>
  <div class="row row_style">
    <div class="container main_page">
      
    </div>
    <?php 
      include "modals.php";
      include "../modal_main.php";
  ?>
</div>




<!-- include libary js -->
<script src="Include/js/jquery.min.js" ></script>
<script src="Include/js/popper.min.js"></script>
<script src="Include/js/bootstrap.min.js"></script>
<script src="Include/js/admin_js.js"></script>
<?php 
   include "foot_admin.php";
?>
</body>
</html>
