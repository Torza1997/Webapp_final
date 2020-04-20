
<!DOCTYPE html>
<html>
<?php 
require 'connect.php'; 
?>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="css/css.css">
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
	    $strKeyword = $_POST["txtKeyword"];
            $sql = "SELECT * FROM Peo_ple2 WHERE Full_name LIKE '%".$strKeyword."%'";
	}else{
            $sql = "SELECT * FROM Peo_ple2";
        }
?>
<center><h1>TEST DOCKER</h1></center>
<br>
<form class="form-inline my-2 my-lg-0" name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
      <button type="button" class="btn btn-success mr-2 " data-toggle="modal" data-target="#exampleModalCenter">
	  Add Data
      </button>
      <input class="form-control mr-sm-2" type="search" name = "txtKeyword" id="txtKeyword" placeholder="Search" aria-label="Search" value="<?php echo $strKeyword;?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full_name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
	    <?php 
	       
	     $result = $conn->query($sql);
	      if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		   echo "<tr>
	      	          <th scope='row'>". $row["id"]."</th>
	      		  <td>". $row["Full_name"]."</td>
	      		  <td>". $row["Phone"]."</td>
	      		  <td>". $row["Email"]."</td>
	    		</tr>";
		  }
		} else {
		   echo "0 results";
		}
	      $conn->close();
	    ?>
  </tbody>
</table>
<?php 
	include 'popup.php';
?>
 
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src = "js/js.js"></script>

</html>

