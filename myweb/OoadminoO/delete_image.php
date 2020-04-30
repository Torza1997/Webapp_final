<?php 
	include '../connect_db.php';
	$local = "../Include/images/".$_POST['img'];
	if($_POST['key'] == 'delete_image'){
		if(unlink($local)){
			$sql = "DELETE FROM Image_header WHERE id='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
			    echo 1;
			} else {
			    echo "Error deleting record: " . mysqli_error($conn);
			}
			mysqli_close($conn);
		}else{
			echo 0;
		}

	}
 ?>