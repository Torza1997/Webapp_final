<?php 
   include "connect_db.php";
   date_default_timezone_set("Asia/Bangkok");
   session_start(); 
   $date = date("Y/m/d H:i:s");
   $Statu_begin = 0;
   $check = 0;

   $b_lean_c = 1;

   if($_POST['key'] == 'Insert_order' and !empty($_SESSION['@_$username'])){
    if(!empty($_SESSION['cart'])){

          while($b_lean_c){
            $ref_num = sprintf("%06d", mt_rand(1, 999999));
            $sql = "SELECT * FROM Order_list WHERE Ref_number = '".$ref_num."'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $b_lean_c = 0;
            }else{

            }
          }
 
          $sql = "INSERT INTO Order_list(User_ID,Status,Date_,Ref_number)
                  VALUES ('".$_SESSION['@_$username']."', '".$Statu_begin."','".$date."','".$ref_num."')";

          if ($conn->query($sql) === TRUE) {
             foreach ($_SESSION['cart'] as $key => $value) {
                 $Order_menu = "INSERT INTO Menu_list(User_ID,Menu_ID,Quantity,_Status,_Date,Ref_number)
                                VALUES ('".$_SESSION['@_$username']."','".$value['id_produc']."',
                                        '".$value['quantity']."','".$Statu_begin."','".$date."','".$ref_num."')";
                if($conn->query($Order_menu) === TRUE){
                  $check = 1;
                }else{
                   echo 2;
                }
              }
              if($check == 1){
                echo $check;
                include 'bill.php';
                unset($_SESSION['cart']);
              }
           } else {
              echo 3;
          }
      }else{
           echo 4;   
      }  
   }else{ 
    echo 5;
   }
?>