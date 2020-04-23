<?php 
   session_start(); 
   if(!empty($_SESSION['cart'])){
           foreach ($_SESSION['cart'] as $key => $value) {
             # code...
             echo $value['produc'];
             echo '&nbsp&nbsp';
             echo $value['price'];echo "บ.";
             echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
             echo $value['quantity'];
             echo "<br>";
           }
           //var_dump($_SESSION['cart']);
           //unset($_SESSION["cart"]);
           echo "<hr>*ถ้าต้องการสั่งทั้งหมดหรือยกเลิกให้เข้าไปในตะกร้าสิ้นค้า</hr>";
      }else{
              echo "<br><center><h5>ยังไม่มีรายการสั่ง</h5></center>";
          }  
?>
<script type="text/javascript">
	  var element = document.getElementsByClassName("badge")[0];
    element.innerHTML = <?php echo count($_SESSION['cart']);?>;
</script>
