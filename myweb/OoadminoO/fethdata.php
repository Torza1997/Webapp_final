<?php 
	include '../connect_db.php';

	if($_POST['key'] == 'fetch'){
		$sql = "SELECT * FROM Product WHERE id = '".$_POST['id']."' "; 
      	$result = mysqli_query($conn, $sql);
      	$row = mysqli_fetch_array($result);
      	echo json_encode($row);
	}
?>