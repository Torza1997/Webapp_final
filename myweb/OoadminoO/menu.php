<?php 
include '../connect_db.php';
?>
<img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="float: left;margin-top: 2%;margin-bottom: 2%;margin-left: 28%;">
<h1 style="float: left;" id= "animate_menu">เมนูที่ทางร้านมีทั้งหมด</h1>
<table class="table table-hover table_style">
  <thead class="cart_table_header">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ชื่อสิ้นค้า</th>
      <th scope="col">ประเภท</th>
      <th scope="col">ราคา</th>
      <th scope="col">รูป</th>
      <th scope="col"><center>Edit/delete</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM Product"; 
    $result = mysqli_query($conn, $sql);
    $No = 0;
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $No++;
    ?>
    <tr>
      <th scope="row"><?php echo $No ;?></th>
      <td><?php echo ($row['Pd_name']); ?></td>
      <td><?php if($row['Type'] == 0){echo ("กาแฟ");}else{echo ("เค้ก");}?></td>
      <td><?php echo ($row['Price']);?></td>
      <td><img src="product_img/<?php echo ($row['image']);?>" style = "width: 50px;height: 50px">
        <input type="hidden" id = "image_name<?php echo ($row['id']);?>" name="image_name" value="<?php echo ($row['image']);?>"></td>
      <td>
          <center>
          <a id = "<?php echo ($row['id']);?>" onClick="edit_menu(this.id); return false;" href="javascript:void(0)" class="btn Edit">แก้</a>
          <a id = "<?php echo ($row['id']);?>" onClick="del_menu(this.id); return false;" href="javascript:void(0)" class="btn delete">ลบ</a>
          </center>
      </td>
    </tr>
    <?php  
      }
    }
    ?>
  </tbody>
</table>
<center><a id = "ADD_memu" onClick="Show_modal(); return false;"  href="javascript:void(0)" class="btn" >เพิ่มเมนูใหม่</a></center>


