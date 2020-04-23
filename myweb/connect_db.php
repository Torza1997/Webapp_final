<?php
$servername = "localhost";
$username = "coffee_web";
$password = "ksdfa46da6fa646af64a6f6a4f6a";
$db = "Coffee_Shop_tortair";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "<script>console.log('Connected successfully')</script>";
?>


