<?php  
session_start();
if(isset($_POST['key'])) {
	if($_POST['key'] == 'Delete'){
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['id_produc'] == $_POST['id']) {
				unset($_SESSION['cart'][$key]);
			}
		}
	}
}
?>