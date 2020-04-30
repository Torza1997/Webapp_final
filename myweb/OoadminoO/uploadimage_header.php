<?php
include '../connect_db.php';
$Status = 1;
if($_FILES["file"]["name"] != '')
{	
 $name = $_FILES["file"]["name"];
 $location = '../Include/images/' . $name;
 if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
 	$sql = "INSERT INTO Image_header(Image_name,Status_)VALUES ('".$name."','".$Status."')";
 	if ($conn->query($sql) === TRUE) {
		echo 1;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
  }
}
?>