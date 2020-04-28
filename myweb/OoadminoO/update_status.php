<?php
include '../connect_db.php';
	if(!empty($_POST)){
		$user = $_POST['user'];
		$Menu_id = $_POST['id'];
		$key = $_POST['key'];
		$Rf_n = $_POST['rf_n'];

		if($key == 'cook_'){
			$status_ = 1 ;
		}else if($key == 'cooking_'){
			$status_ = 2 ;
		}
		$u_sql = "UPDATE Menu_list SET _Status = '".$status_."' WHERE User_ID = '".$user."' AND id ='".$Menu_id."' AND Ref_number ='".$Rf_n."'";
		if ($conn->query($u_sql) === TRUE) {
			echo $status_;
		} else {
			//echo 2;
		}

		$array_n = array();

		$sql = "SELECT * FROM Menu_list WHERE User_ID = '".$user."' AND Ref_number ='".$Rf_n."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		       if($row['_Status'] == 2){
		       		array_push($array_n, $row['_Status']);
		       }
		    }
		} else {
		   // echo 3;
		}
		
		if($result->num_rows == count($array_n)){
	       $status_O = 2;
	    }else{
	       $status_O = 1;	
	    } 

	    $Ol_sql = "UPDATE Order_list SET Status = '".$status_O."' WHERE User_ID = '".$user."' AND Ref_number ='".$Rf_n."' ";
	    if ($conn->query($Ol_sql) === TRUE) {

	    }else{

	    }

	}
	$conn->close();
  ?>