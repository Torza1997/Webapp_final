<?php
include '../connect_db.php';
date_default_timezone_set("Asia/Bangkok");
if(!empty($_POST)){

	if(!empty($_POST['ubdate'])){
	   if ($_POST['menu_price'] != '' and $_POST['menu_name'] != '' ){
		if($_FILES["file"]["name"] != '')
				{
					$filename = $_FILES["file"]["name"];	
					$location = 'product_img/' . $filename;
					move_uploaded_file($_FILES["file"]["tmp_name"], $location);
					$sql = "UPDATE Product SET Pd_name = '".$_POST['menu_name']."',
					Type = '".$_POST['Type_menu']."' ,
					Price = '".$_POST['menu_price']."' ,
					image = '".$filename."'
					WHERE id ='".$_POST['menu_id']."'";
				}else{
					$sql = "UPDATE Product SET Pd_name = '".$_POST['menu_name']."',
					Type = '".$_POST['Type_menu']."' ,
					Price = '".$_POST['menu_price']."'
					WHERE id ='".$_POST['menu_id']."'";
				}
				if ($conn->query($sql) === TRUE) {
					echo 1;
				} else {
				    echo "Error updating record: " . $conn->error;
				}
			}else{
			echo 0;
		}
	}else{
		if ($_POST['menu_price'] != '' and $_POST['menu_name'] != '' ){
			if($_FILES["file"]["name"] != '')
				{
					$filename = $_FILES["file"]["name"];	
					//$test = explode('.', $_FILES["file"]["name"]);
					//$ext = end($test);
					//$name = $filename. '.' . $ext;
					$location = 'product_img/' . $filename;

					$sql = "INSERT INTO Product(Pd_name,Type,Price,image)
					VALUES ('".$_POST['menu_name']."', '".$_POST['Type_menu']."', '".$_POST['menu_price']."','".$filename."')";

					if ($conn->query($sql) === TRUE) {
					 	move_uploaded_file($_FILES["file"]["tmp_name"], $location);
					 	echo 1;
					} else {
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}else{
					echo 0;
				}
			
		}else{
			echo 0;
		}
	}

}
