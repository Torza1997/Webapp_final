<?php 
	include '../connect_db.php';
	date_default_timezone_set("Asia/Bangkok");
	$datas = '';
	$total_coffee =0;
	$total_cake =0;
	$date = date("Y/m/d");
	$sql ="SELECT * FROM Product_Sales WHERE Date_s = '".$date."'";
	$data = mysqli_query($conn,$sql);
	if(mysqli_num_rows($data)>0){
		while ($row = mysqli_fetch_assoc($data)) {
			if($row['Type'] == 0){
				$total_coffee = $total_coffee + $row['Total'];
			}else{
				$total_cake = $total_cake + $row['Total'];
			}
			$date_s = date_create($row['Date_s']);

			$datas = "[ ['Day', 'เค้ก', 'กาแฟ'],
						['".date_format($date_s,"Y/m/d")."', '".$total_cake ."', '".$total_coffee."'],
					  ]";
		}
	}else{
	}
?>
<img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="float: left;margin-top: 2%;margin-bottom: 2%;margin-left: 25%;">
<h1 style="float: left;" id= "animate_sales">ยอดขายของร้านต้อแต้</h1>
<div style="margin-top: 12%;margin-bottom: 5%;">

    <script type="text/javascript" src="Include/js/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $datas;?>);

        var options = {
          chart: {
            title: 'ยอดขายรายวันของร้าน',
            subtitle: 'ในปี '+<?php  echo date("Y");?>,
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <center>
    	<div id="columnchart_material" style="width: 800px; height: 500px;">	</div>
	</center>
 </div>
