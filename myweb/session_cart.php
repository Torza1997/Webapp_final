<center><h3>รายการที่สั่ง</h3></center>
<?php 
    session_start();
    if(isset($_SESSION['cart'])){
    	$item_array_id = array_column($_SESSION['cart'], 'id_produc');
    	if(!in_array($_POST['id'], $item_array_id)){
    		$count = count($_SESSION['cart']);
    		$item_array = array(
							'id_produc' 	=> $_POST['id'],
							'produc' 	=> $_POST['produc'],
							'price' => $_POST['price'],
							'quantity' => $_POST['quantity']
							);
			$_SESSION['cart'][$count] = $item_array;
    	}else{
    		$key = array_search($_POST['id'], $item_array_id);
    		$item_array = array(
							'id_produc' 	=> $_POST['id'],
							'produc' 	=> $_POST['produc'],
							'price' => $_POST['price'],
							'quantity' => $_POST['quantity']
							);
			$_SESSION['cart'][$key] = $item_array;
		    }    
	}else{
		$item_array = array(
							'id_produc' 	=> $_POST['id'],
							'produc' 	=> $_POST['produc'],
							'price' => $_POST['price'],
							'quantity' => $_POST['quantity']
							);
		$_SESSION['cart'][0] = $item_array;
	}
 ?> 