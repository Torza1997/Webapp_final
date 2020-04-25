
<?php 
session_start();

if(isset($_POST)){
	if($_POST['key'] == 'logout'){
		session_destroy();
		echo 1;
	}else{
		echo 2;
	}
}

?>