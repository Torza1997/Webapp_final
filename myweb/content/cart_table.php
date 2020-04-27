
<div class="container row1">
 <table class="table table-hover">
  <thead class="cart_table_header">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Coffee/Cake</th>
      <th scope="col">quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody id = "set_null">
  	<?php 
  session_start();
  if (!empty($_SESSION['cart'])) {
  		$total = 0;
  		$no = 0 ; 
  		foreach ($_SESSION['cart'] as $key => $value) {
  		$no++;
  	 ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $value['produc']; ?></td>
      <td><?php echo $value['quantity']; ?></td>
      <td><?php echo $value['price']; ?></td>
      <td><?php echo number_format($value['price']*$value['quantity'],2); ?></td>
      <td><a id = "<?php echo $value['id_produc'];?>" onClick="Delete(this.id); return false;" href="javascript:void(0)" class="btn">ยกเลิก</a></td>
    </tr>

    <?php 
    	$total = $total +($value['price']*$value['quantity']);
      } 
      ?>
      <tr>
    	<td colspan="4" align="right">รวมทั้งหมด</td>
    	<td align="right"><?php echo number_format($total,2)?>&nbspบาท</td>
    	<td></td>
    </tr>
    <?php
  	}else{
  		echo "<center><h5>ยังไม่มี Order ของลูกค้า</h5></center>";
  	}
    ?>
    

  </tbody>
</table>
<?php
  if (!empty($_SESSION['cart'])) {
     echo '<center><button onClick="confirm_insert_orders(); return false;" type="button" class="btn" style="margin-top: 2%">สั่งทั้งหมด</button></center>';
   } 
?>
</div>