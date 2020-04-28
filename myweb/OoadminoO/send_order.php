<?php 
	include '../connect_db.php';

	$user_id = $_POST['User_id'];
	$Ref_no = $_POST['Ref_no'];

	if(!empty($_POST)){
		
		$sql = "SELECT * FROM Menu_list WHERE User_ID = '".$user_id."' AND Ref_number ='".$Ref_no."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		    	$sql_p = "SELECT * FROM Product  WHERE id ='".$row['Menu_ID']."'";
				$data = mysqli_query($conn,$sql_p) or dei(mysql_error());
				$row_p = mysqli_fetch_assoc($data);

		       	echo $row_p['Pd_name'];

		    }
		} else {
		   
		}


	}
?>