<?php 
include '../connect_db.php';
?>
<img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="float: left;margin-top: 2%;margin-bottom: 2%;margin-left: 34%;">
<h1 style="float: left;" id= "animate_order_S">Order Lists</h1>
<table class="table table-hover table_style_order">
  <thead class="cart_table_header">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">วัน/เวลา</th>
      <th scope="col">เบอร์โทร</th>
      <th scope="col">ที่อยู่</th>
      <th scope="col">Order</th>
      <th scope="col">สถานะ</th>
      <th scope="col"><center>delete</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM Order_list"; 
    $result = mysqli_query($conn, $sql);
    $No = 0;
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $No++;
        $user_sql = "SELECT * FROM user_all WHERE Username = '".$row['User_ID']."'";
        $user_data = mysqli_query($conn, $user_sql);
        if(mysqli_num_rows($user_data) > 0){
          $row_s = mysqli_fetch_assoc($user_data);
        }
    ?>
    <tr>
      <td scope="row"><?php echo $No ;?></td>
      <td><?php echo $row_s['F_name']; ?></td>
      <td><?php echo $row_s['L_name']; ?></td>
      <?php $date_s = date_create($row['Date_']);?>
      <td><?php echo date_format($date_s,"Y/m/d H:i:s");?></td>
      <td><?php echo $row_s['Phone'];?></td>
      <td><a id ="<?php echo $row_s['Adddress']; ?>" onClick="VieW_address(this.id); return false;" href="javascript:void(0)">View</a></td>
      <td><a class = "<?php echo $row['Ref_number']; ?>" id ="<?php echo $row['User_ID']; ?>" onClick="VieW_Menu_list(this.id,this.className); return false;" href="javascript:void(0)">View</a></td>
      <td><?php if($row['Status'] == 0){echo "ยังทำไม่เส็จ";}else if($row['Status'] == 1){echo "กำลังทำ";}else if($row['Status'] == 2){echo "ทำเส็จแล้ว";}?></td>
      <td>
          <center>
          <a id = "<?php echo ($row['id']);?>"  href="javascript:void(0)" class="btn delete">ลบ</a>
          </center>
      </td>
    </tr>
    <?php  
      }
    }
    ?>
  </tbody>
</table>


