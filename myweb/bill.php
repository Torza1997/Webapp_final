<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 10,
	'default_font' => 'sarabun',
	'setAutoTopMargin' => 'pad',
]);
ob_start();
?>
<html>
		<head>
			<style>
				.row_style{
					margin: 10%;
					//border: 1px solid red;
				}

				.text-center{
					text-align: center;
				}
				.date_style{
					margin-top:15%;
				}
				.table_style{
					width: 550px;
					margin-top:2%;
					font-size: 150%;
				}
				th{ 
					text-align:left;
					background-color: #D1FF00;
				}
				h2{
					margin-top:10%;
					margin-left: 65%;
				}	
			</style>
		</head>
		<body>
			<div class ="row row_style">
				<div class ="col-2 col_style">
				      <h1 class ="text-center ">TORTAIR COFFEE STORE</h1>
				      <h3  class = "date_style">Date Issue: <?php echo  date('d/m/Y'); ?></h3>
				      <h3 class = "time_style">Time Issue: <?php echo date("H:i:s"); ?></h3>
				      <h3 class = "time_style">Customer: <?php echo $_SESSION['@_$F_name']; ?> <?php echo $_SESSION['@_$L_name']; ?></h3>
				</div>

				<div class ="col-6 col_style">
					<table class = "table_style">
						<thead>
							<tr>
								<th>No</th>
								<th>รายการที่สั่ง</th>
								<th>จำนวน</th>
								<th>ราคา</th>
								<th>ราคารวม</th>
								<th>หน่วยเงิน</th>
							</tr>
							
						</thead>
						<tbody>
							 <?php 
							 $no_s = 0;
							 $total = 0;
							 if(!empty($_SESSION['cart'])){
							     foreach ($_SESSION['cart'] as $key => $value) {
							     	$no_s++;
							         echo '
							          <tr>
										<td>'.$no_s.'</td>
										<td>'.$value['produc'].' </td>
										<td>'.$value['quantity'].'</td>
										<td>'.$value['price'].'</td>
										<td>'.$value['price'] * $value['quantity'].'</td>
										<td>บาท</td>
										</tr>
							             ';
    									$total = $total +($value['price']*$value['quantity']);
							           }
					      	   	   }

					      	   ?>		
						</tbody>
					</table>
				</div>
				<div class ="col-2 col_style">
					 <h2>ราคารวมทั้งหมด <?php echo number_format($total,2)?> บาท</h2>
			</div>
			<div>

		</body>
   </html>
<?php
$htm = ob_get_contents();
ob_end_clean();
$mpdf->useFixedNormalLineHeight = false;
$mpdf->useFixedTextBaseline = false;
$mpdf->adjustFontDescLineheight = 0.1;

$mpdf->WriteHTML($htm);
$mpdf->Image('Include/images/logo.png', 55, 14, 20, 20, 'jpg', '', true, false);
$mpdf->Output('MY_bills/mybill.pdf','F');
?>