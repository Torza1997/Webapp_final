<?php 
   session_start(); 
   if($_POST['key'] == 'Insert_order'){
    if(!empty($_SESSION['cart'])){

           foreach ($_SESSION['cart'] as $key => $value) {
            /* echo $value['produc'];
             echo $value['price']*$value['quantity'];
             echo "บ.";
             echo $value['quantity'];
             echo "<br>";
            */
           }
            include 'bill.php';
            echo 1;
      }else{
           echo 0;   
      }  
   }else{ 
    echo 0;
   }
?>