<!DOCTYPE html>
<?php 
  include "connect_db.php"; 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Include/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Include/css/main_css.css">
    <link href="/Include/css/fonts.css" rel="stylesheet">
    <link rel="shortcut icon" href="/Include/images/logo.png" />
    <title>TORTAIR COFFEE STORE</title>

</head>
<body>
<div>
  <div class="row">
  <!--left-->
    <div class="col-2">
      <div class="row-6 left fixed-div-order" id="myOrder">
        <center><h3 style="margin-top: 5%;">รายการที่สั่ง</h3></center>

        <div class="container show" id = "show_S">

        </div>

        <br>
      </div>
    </div>
  <!--center-->
    <div class="col-8">
      <div class="container">
        <?php 
          include "Carousel.php";
          include "navbar.php";
          include "nav2.php";
        ?>
      </div>

      <div class="container home" id="home" >
      </div>

    </div>
   <!--right-->
    <div class="col-2">

      <?php 
        $sql_r = "SELECT * FROM Image_header WHERE Status_ = 2 "; 
        $result_r = mysqli_query($conn, $sql_r);
        if(mysqli_num_rows($result_r) == 1) {
        $row_r = mysqli_fetch_assoc($result_r);
        ?>
            <div class="row-6 right" style="background:url('Include/images/<?php echo $row_r['Image_name'];?>');background-size: cover;background-position: center;background-repeat: no-repeat;">
        <?php 
          }
        ?>
        
      </div>
    </div>

  </div>
  
</div>

<?php 
    include 'modal_main.php';
?>



<!-- include libary js -->
<script src="/Include/js/jquery.min.js" ></script>
<script src="/Include/js/popper.min.js"></script>
<script src="/Include/js/bootstrap.min.js"></script>
<script src="/Include/js/main_js.js"></script>
<!-- end js -->
<?php 
   include "foot.php";
?>

</body>
</html>
