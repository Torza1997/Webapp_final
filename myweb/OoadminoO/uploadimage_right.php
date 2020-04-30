<?php
include '../connect_db.php';
$Status = 2;
if($_FILES["file"]["name"] != '')
{	
 $name = $_FILES["file"]["name"];
 $location = '../Include/images/' . $name;
 if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
	
	$query = "SELECT * FROM Image_header WHERE Status_ = '".$Status."'";
	$result = mysqli_query($conn,$query) or dei(mysql_error());
	$rows = mysqli_num_rows($result);

	if($rows == 0){
		$sql = "INSERT INTO Image_header(Image_name,Status_)VALUES ('".$name."','".$Status."')";
	}else{
		$sql = "UPDATE Image_header SET Image_name = '".$name."' WHERE Status_ = '".$Status."'";
	}
	if ($conn->query($sql) === TRUE) {
		echo 1;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
  }
}
?>