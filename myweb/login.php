<?php 
include "connect_db.php"; 
session_start();

if(isset($_POST)){
	$username = $_POST['Username_login'];
	$password = $_POST['userPassword_login'];

	$query = "SELECT * FROM user_all WHERE Username ='".$username."' AND Password = '".md5($password)."' ";
	$result = mysqli_query($conn,$query) or dei(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows == 1){
		$_SESSION['@_$username'] = $username;
		echo 1;
	}else{
		$sql = "SELECT * FROM admin_S  WHERE username_admin ='".$username."' AND password_admin = '".md5($password)."' ";
		$data = mysqli_query($conn,$sql) or dei(mysql_error());
		if( mysqli_num_rows($data) == 1){
			$row = mysqli_fetch_assoc($data);
			$_SESSION['@_$ADDS_USERNAME'] = $username;
			$_SESSION['status_@_admin'] = $row['Status_admin'];
			echo 1;
		}else{
			echo 2;
		}
	}

}
?>