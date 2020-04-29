<?php 
include '../connect_db.php';
?>
<img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="float: left;margin-top: 2%;margin-bottom: 2%;margin-left: 20%;">
<h1 style="float: left;" id= "animate_admin_of_tortair">Admin Of Tortair Coffe Store</h1>
<table class="table table-hover table_style_order">
  <thead class="cart_table_header">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col"><center>ลบ</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM admin_S"; 
    $result = mysqli_query($conn, $sql);
    $No = 0;
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $No++;
    ?>
    <tr>
      <td scope="row"><?php echo $No ;?></td>
      <td><?php echo $row['F_name']; ?></td>
      <td><?php echo $row['L_name']; ?></td>
      <td><?php echo $row['phone'];?></td>
      <td>
          <center>
              <a id = "<?php echo $row['id']; ?>" onClick="delete_admin_user(this.id); return false;"  href="javascript:void(0)" class="btn delete">ลบ</a>
          </center>
      </td>
    </tr>
    <?php  
      }
    }
    ?>
  </tbody>
 
</table>

<center><a id = "ADD_addmin" onClick="add_admin(this.id); return false;"  href="javascript:void(0)" class="btn" >เพิ่มแอดมิน</a></center>