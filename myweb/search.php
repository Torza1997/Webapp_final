<?php 
session_start();
include "connect_db.php";
$sql = "SELECT * FROM Product WHERE Pd_name LIKE '%".$_POST['search']."%'"; 
$result = mysqli_query($conn, $sql);
echo '<div class="row row1">';
if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
     		 echo'
        		<div class="col-3">
		        <div class="card" style="width: 15rem;">
		        <img src="OoadminoO/product_img/'.$row["image"].'" class="card-img-top" alt="..." style="width: auto; height:200px">
		        <div class="card-body" >
		          <form action="javascript:void(0)">
		          <center>
		            <h5 id = "name'.$row["id"].'" class="card-title">'.$row["Pd_name"].'</h5>
		            <p  class="card-text">ราคา '.$row["Price"].'บ.</p>
		            <p style="display: none" id = "price'.$row["id"].'" class="card-text">'.$row["Price"].'</p>
		             <button class="btn buttons">-</button>
		             <input id="quantity'.$row["id"].'" type="text" name="quantity" value="1" class="form-control">
		             <button class="btn buttons">+</button>
		             ';
		            if($_SESSION['@_$username'] != ''){
	                  echo '<a id = "'.$row["id"].'" onClick="getids(this.id); return false;" href="javascript:void(0)" class="btn adds">สั่ง</a>';
	                }else{
	                  echo '<a id = "'.$row["id"].'" onClick="alert_(); return false;" href="javascript:void(0)" class="btn adds">สั่ง</a>';
	                }
		         echo'</center>
		          <form>
		        </div>
		        </div>
		      </div>';
         }
    }
    echo '</div> 
    		<script type="text/javascript">
					$(".buttons").on( "click", function() {
					    var $button = $(this);
					    var oldValue = $button.parent().find("input").val();
					    if ($button.text() == "+") {
					      var newVal = parseFloat(oldValue) + 1;
					    } else {
					      if (oldValue > 0) {
					        var newVal = parseFloat(oldValue) - 1;
					      } else {
					        newVal = 0;
					      }
					    }

					    $button.parent().find("input").val(newVal);
					});
			</script>';
?>