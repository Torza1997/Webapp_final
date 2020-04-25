<?php 
	include '../connect_db.php';
	$local = "product_img/".$_POST['image'];
	if($_POST['key'] == 'delete_menu'){
		if(unlink($local)){
			$sql = "DELETE FROM Product WHERE id='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
			    echo "Record deleted successfully";
			} else {
			    echo "Error deleting record: " . mysqli_error($conn);
			}
			mysqli_close($conn);
		}else{
			echo "error delete";
		}

	}
 ?>