<?php
include "../connect_db.php";
date_default_timezone_set("Asia/Bangkok"); 

if(isset($_POST)){
	$F_name = $_POST['F_name']; $L_name = $_POST['L_name'];
	$user_name = $_POST['user_name']; $user_pw = $_POST['user_pw'];
	$user_phone = $_POST['user_phone']; $status = 9;

	if(empty($F_name) || empty($L_name) || empty($user_name) || empty($user_pw) || empty($user_phone)){
		echo 1 ;
		exit();
	}else if(!filter_var($user_phone, FILTER_SANITIZE_NUMBER_INT)){
		echo 2;	
	}else if(preg_match("/^[\w\s\.-]*$/", $user_name)){
	    echo 3;
	}else{
		
		$query = "SELECT * FROM admin_S WHERE username_admin ='".$user_name."'";
		$result = mysqli_query($conn,$query) or dei(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows == 1){
			echo 5;
		}else{
			$sql = "INSERT INTO admin_S (F_name,L_name,username_admin,password_admin,phone,Status_admin) 
			        VALUES ('".$F_name."','".$L_name."','".$user_name."','".md5($user_pw)."','".$user_phone."','".$status."')";
			if ($conn->query($sql) === TRUE) {
				echo 6;
			} 
			else {
				echo 7;	    
			}

		}
 
	}
}