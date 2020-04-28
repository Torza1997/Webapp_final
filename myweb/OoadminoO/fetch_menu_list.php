<?php
include '../connect_db.php';
$output_html ='';
$No = 0;
$total = 0;
if (!empty($_POST)) {
	if ($_POST['key'] == 'fecth_menu_list') {
		$sql_memu_list = "SELECT * FROM Menu_list WHERE Ref_number = '".$_POST['Rf_n']."' AND User_ID = '".$_POST['id']."'";
		$data_menu_list = mysqli_query($conn,$sql_memu_list);



		if(mysqli_num_rows($data_menu_list)>0){
			while ($result_rows = mysqli_fetch_assoc($data_menu_list)) {
			$No++;
	        $sql = "SELECT * FROM Product WHERE id = '".$result_rows['Menu_ID']."'";
	        $detail_menu = mysqli_query($conn, $sql);
	        if(mysqli_num_rows($detail_menu) > 0){
	          $row_s = mysqli_fetch_assoc($detail_menu);
	        }

	        if($result_rows['_Status'] == 0){
	        	$Status = "<a class = 'cook_' id = '".$result_rows['id']."' onClick='update_cook_status(this.id,this.className); return false;'>ทำ</a>";

	        }else if($result_rows['_Status'] == 1){
	        	$Status = "<a class = 'cooking_' id = '".$result_rows['id']."' onClick='update_cook_status(this.id,this.className); return false;'>กำลังทำ</a>&nbsp<i style ='' class='fas fa-cog fa-spin'></i>";
	        }else{
	        	$Status = "<a class = 'cook_success' id = '".$result_rows['id']."' >รอส่ง</a>&nbsp<i class='fas fa-box'></i>";
	        }
	        $total = $total + $result_rows['Quantity']*$row_s['Price'];
			$output_html ='<tr>
                  <td>'.$No.'</td>
                  <td>'.$row_s['Pd_name'].'</td>
                  <td>'.$result_rows['Quantity'].'</td>
                  <td>'.$row_s['Price'].'</td>
                  <td>'.number_format($result_rows['Quantity']*$row_s['Price'],2).'</td>
                  <td id = "add_new_b'.$result_rows['id'].'" style ="text-align: center;">'.$Status.'</td>
                  <td id = "'.$result_rows['Menu_ID'].'" style ="text-align: center;" onClick="admin_delete_oder_one(this.id); return false;"><a>ยกเลิก</a></td>
                </tr>';
			echo $output_html;	
			}

			$user_sql = "SELECT * FROM user_all WHERE Username = '".$_POST['id']."'";
	        $user_data = mysqli_query($conn, $user_sql);
	        if(mysqli_num_rows($user_data) > 0){
	          $Rows = mysqli_fetch_assoc($user_data);
	        }
			$output_html =' <tr>
                	<td colspan="4" style ="text-align: right;">Totals</td>
                	<td>'.number_format($total,2).'&nbspบาท</td>
                	<td></td>
                	<td></td>
                </tr>
                <script type="text/javascript">
					$("#User_name_s").html("รายการของคุณ:&nbsp'.$Rows['F_name'].'&nbsp'.$Rows['L_name'].'");
					$("#_user_ID").val("'.$_POST['id'].'");
					$("#RF_n").val("'.$_POST['Rf_n'].'");
				</script>
                '
                ;
            echo $output_html;
		}
	}
}
?>
