<?php
$files = glob('Include/images/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file); 
}
if($_FILES["file"]["name"] != '')
{	
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = $_FILES["file"]["name"]. '.' . $ext;
 $location = 'Include/images/' . $name;
 if(move_uploaded_file($_FILES["file"]["tmp_name"], $location)){
 	echo '<center><img src="'.$location.'" height="150" width="225" class="img-thumbnail" /></center>';
  }  
}
?>