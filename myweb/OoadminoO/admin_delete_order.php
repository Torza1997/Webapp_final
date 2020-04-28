<?php 
	include '../connect_db.php';
	$reference_number = $_POST['Ref_no'];
	if(!empty($_POST)){
		/******************delete Order all********************/
		if($_POST['key'] == 'delete_order_all'){
			$sql_do = "DELETE FROM Order_list WHERE Ref_number ='".$reference_number."'";
			if ($conn->query($sql_do) === TRUE) {
					$sql_dm = "DELETE FROM Menu_list WHERE Ref_number ='".$reference_number."'";
					if ($conn->query($sql_dm) === TRUE) {
						echo 1;
					} else {
						echo 2;
					}
			} else {

			}
		}
		/**************************************/
		/******************delete Order one********************/
		if($_POST['key'] == 'admin_delete_order'){

			$sql_d = "DELETE FROM Menu_list WHERE Ref_number ='".$reference_number."' AND Menu_ID = '".$_POST['memu_id']."' 
					  AND User_ID = '".$_POST['User_id']."'";

			if ($conn->query($sql_d) === TRUE){

				$sql_dm = "SELECT * FROM Menu_list WHERE User_ID = '".$_POST['User_id']."' AND Ref_number ='".$reference_number."'";
				$result = $conn->query($sql_dm);
				if ($result->num_rows > 0) {
					

				}else{
					$sql_do = "DELETE FROM Order_list WHERE Ref_number ='".$reference_number."'";
					$conn->query($sql_do);
				}
				echo 1;	
			} else {
				echo 2;
			}
		}
		/**************************************/

	}
/*
$sql_dm = "DELETE FROM Menu_list WHERE Ref_number ='".$reference_number."'";
					if ($conn->query($sql_dm) === TRUE) {
						echo 1;
					} else {
						echo 2;
					}*/
?>
