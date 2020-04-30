<?php 
include '../connect_db.php';
session_start();
print_r($_SESSION["cook_status_"]);
?>
<img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="float: left;margin-top: 2%;margin-bottom: 2%;margin-left: 34%;">
<h1 style="float: left;" id= "animate_order_S">Image Head</h1>

<input type="file" class="form-control-file" name="file" id="file_head">
<table class="table table-hover table_style_order">
  <thead class="cart_table_header">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ชื่อภาพ</th>
      <th scope="col"><center>ลบ</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM Image_header WHERE Status_ = 1"; 
    $result = mysqli_query($conn, $sql);
    $No = 0;
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $No++;
    ?>
    <tr>
      <td scope="row"><?php echo $No ;?></td>
      <td><img src="/Include/images/<?php echo $row['Image_name']; ?>" width="300" height="100" class="d-inline-block align-top" alt="" style=""></td>
      <td>
      <center>
      <a id = "<?php echo $row['Ref_number']; ?>" onClick="Delete_head_image(this.id); return false;"  href="javascript:void(0)" class="btn delete">ลบ</a>
      </center>
      </td>
    </tr>
    <?php  
      }
    }
    ?>
  </tbody>
 
</table>

<img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="float: left;margin-top: 2%;margin-bottom: 2%;margin-left: 34%;">
<h1 style="float: left;" id= "animate_order_S">Image Right</h1>
<input type="file" class="form-control-file" name="file" id="file_right">
<table class="table table-hover table_style_order">
  <thead class="cart_table_header">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ชื่อภาพ</th>
      <th scope="col"><center>ลบ</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM Image_header WHERE Status_ = 2"; 
    $result = mysqli_query($conn, $sql);
    $No = 0;
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $No++;
    ?>
    <tr>
      <td scope="row"><?php echo $No ;?></td>
      <td><img src="/Include/images/<?php echo $row['Image_name']; ?>" width="70" height="70" class="d-inline-block align-top" alt="" style=""></td>
      <td>
      <center>
      <a id = "<?php echo $row['Ref_number']; ?>" onClick="Delete_head_image(this.id); return false;"  href="javascript:void(0)" class="btn delete">ลบ</a>
      </center>
      </td>
    </tr>
    <?php  
      }
    }
    ?>
  </tbody>
 
</table>



