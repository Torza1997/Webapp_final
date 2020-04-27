
<?php 
session_start();

if(isset($_POST)){
	if($_POST['key'] == 'logout'){
		unset($_SESSION['@_$ADDS_USERNAME']);unset($_SESSION['status_@_admin']);unset($_SESSION['cart']);
		unset($_SESSION['@_$username']);unset($_SESSION['@_$F_name']);unset($_SESSION['@_$L_name']);
		//session_destroy();
		echo 1;
	}else{
		echo 2;
	}
}

?>