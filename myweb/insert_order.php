<?php 
   include "connect_db.php";
   session_start(); 

   $date = date("Y/m/d");
   $Statu_begin = 0;
   $check = 0;
   if($_POST['key'] == 'Insert_order' and !empty($_SESSION['@_$username'])){
    if(!empty($_SESSION['cart'])){
          $sql = "INSERT INTO Order_list(User_ID,Status,Date_)
                  VALUES ('".$_SESSION['@_$username']."', '".$Statu_begin."','".$date."')";

          if ($conn->query($sql) === TRUE) {
             foreach ($_SESSION['cart'] as $key => $value) {
                 $Order_menu = "INSERT INTO Menu_list(User_ID,Menu_ID,Quantity,_Status,_Date)
                                VALUES ('".$_SESSION['@_$username']."','".$value['id_produc']."',
                                        '".$value['quantity']."','".$Statu_begin."','".$date."')";
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