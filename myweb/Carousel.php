<?php 
  include "connect_db.php"; 
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
  $active = 0; 
  $sql_h = "SELECT * FROM Image_header WHERE Status_ = 1 "; 
  $result_h = mysqli_query($conn, $sql_h);
  if(mysqli_num_rows($result_h) > 0) {
  while($row_h = mysqli_fetch_assoc($result_h)) {
    if($active == 0){?>
        <div class="carousel-item active">
            <img class="d-block w-100" src="/Include/images/<?php echo $row_h['Image_name'];?>">
          </div>

        <?php
        $active++;
        }else{
          ?>
          <div class="carousel-item ">
            <img class="d-block w-100" src="/Include/images/<?php echo $row_h['Image_name'];?>">
          </div>
          <?php
        }
      }
   }
  ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

