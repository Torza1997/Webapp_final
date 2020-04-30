<?php
include '../connect_db.php';
$Status = 2;
if($_FILES["file"]["name"] != '')
{	
 $name = $_FILES["file"]["name"];
 $location = '../Include/images/' . $name;
 if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
 	$sql = "UPDATE Image_header SET Image_name = '".$name."' WHERE Status_ = 2";
 	if ($conn->query($sql) === TRUE) {
		echo 1;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
  }
}
?>