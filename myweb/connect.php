<?php 
  $host = 'localhost';
  $user = 'torza_123';
  $pass = 'torza_123';
  $DB = 'db';
  
  $conn = new mysqli($host,$user,$pass,$DB);
  if($conn->connect_error){
   echo 'connect failled' . $conn->connect_error;
  }
?>
