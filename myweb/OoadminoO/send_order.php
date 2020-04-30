<?php 
	include '../connect_db.php';
	date_default_timezone_set("Asia/Bangkok");
	$date_s_ = date("Y/m/d");

	$user_id = $_POST['User_id'];
	$Ref_no = $_POST['Ref_no'];

	if(!empty($_POST)){

		$sql = "SELECT * FROM Menu_list WHERE User_ID = '".$user_id."' AND Ref_number ='".$Ref_no."'"; /*AND _Status = 2*/
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		    	$sql_p = "SELECT * FROM Product  WHERE id ='".$row['Menu_ID']."'";
				$data = mysqli_query($conn,$sql_p) or dei(mysql_error());
				$row_p = mysqli_fetch_assoc($data);


		       	$sql_Sales = "INSERT INTO Product_Sales(Pd_ID,Type,Price,Quantity,Total,Date_s)
				VALUES ('".$row_p['id']."', '".$row_p['Type']."'
					  , '".$row_p['Price']."','".$row['Quantity']."'
					  ,'".$row['Quantity']*$row_p['Price']."','".$date_s_."')";

				if($conn->query($sql_Sales) === TRUE) {
					
				}else{
					
				}
		    }

		    $sql_do = "DELETE FROM Order_list WHERE Ref_number ='".$Ref_no."'";
			if ($conn->query($sql_do) === TRUE) {

					$sql_dm = "DELETE FROM Menu_list WHERE Ref_number ='".$Ref_no."'";
					if ($conn->query($sql_dm) === TRUE) {} else {}
			} else {}
		
		    echo 1;
		} else {
		    echo 2;
		}


	}
?>