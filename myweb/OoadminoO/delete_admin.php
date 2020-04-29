<?php 
	include '../connect_db.php';
	if($_POST['key'] == 'delete_admin'){
			$sql = "DELETE FROM admin_S WHERE id='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
			    echo "Record deleted successfully";
			} else {
			    echo "Error deleting record: " . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
 ?>