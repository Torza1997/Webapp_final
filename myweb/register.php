<?php
include "connect_db.php";
date_default_timezone_set("Asia/Bangkok"); 
if(isset($_POST)){
	$F_name = $_POST['F_name']; $L_name = $_POST['L_name'];
	$user_name = $_POST['user_name']; $user_pw = $_POST['user_pw'];
	$user_email = $_POST['user_email']; $user_phone = $_POST['user_phone'];
	$user_address =  $_POST['user_address']; $date =  date("Y/m/d");

	if(empty($F_name) || empty($L_name) || empty($user_name) || empty($user_pw) || empty($user_email) || empty($user_address) || empty($user_phone)){
		echo 1 ;
		exit();
	}else if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/", $user_name) && !filter_var($user_phone, FILTER_SANITIZE_NUMBER_INT)) {
	    echo 2;
		exit();
	}else if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
		echo 3;
		exit();
	}else if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
		echo 4;
		exit();
	}else if(!filter_var($user_phone, FILTER_SANITIZE_NUMBER_INT)){
		echo 7;	
	}else{

		$query = "SELECT * FROM user_all WHERE Username ='".$user_name."'";
		$result = mysqli_query($conn,$query) or dei(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows == 1){
			echo 8;
		}else{
			$sql = "INSERT INTO user_all (F_name,L_name,Username,Password,Email,Phone,Adddress,Date_regis) 
			        VALUES ('".$F_name."','".$L_name."','".$user_name."','".md5($user_pw)."','".$user_email."','".$user_phone."','".$user_address."','".$date ."')";
			if ($conn->query($sql) === TRUE) {
				echo 5;
			} 
			else {
				echo 6;	    
			}

		} 
	}
}

		/*$sql = "INSERT INTO user_all (F_name,L_name,Username,Password,Email,Phone,Adddress,Date_regis) VALUES (?,?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo 6;
			exit();
		}else{
			$hashedPwd = password_hash($user_pw, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt,"ssssssss",$F_name,$L_name,$user_name,$user_pw,$user_email,$user_phone,$user_address,date("Y/m/d"));
			mysqli_stmt_execute($stmt);
			echo 8;
			exit();
		}*/
?>

