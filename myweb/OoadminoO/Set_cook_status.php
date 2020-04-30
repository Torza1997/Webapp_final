 <?php
 	 session_start();
	 unset($_SESSION["cook_status_"]);
	 $_SESSION['cook_status_'] = $_POST["Status"]; 
 ?>