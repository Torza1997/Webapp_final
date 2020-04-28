$(document).ready(function(){
  $('.main_page').load('Order_list.php');
});

$('#menu').on('click',function(){
	$('.main_page').load('menu.php');
});
$('#order_list').on('click',function(){
  $('.main_page').load('Order_list.php');
});

function Show_modal(){
	clearFrom();
	$('#ADD_memuss').modal('show');
}
$('#clear').click(function(){
	clearFrom();
})
$(document).ready(function(){
 $(document).on('click', '#submit_add_menu', function(){
  var form_data = new FormData();
   form_data.append("menu_name", document.getElementById('menu_name').value);
   form_data.append("menu_price", document.getElementById('menu_price').value);
   form_data.append("Type_menu", document.getElementById('Type_menu').value);

   form_data.append("ubdate", document.getElementById('status_ubdate').value);
   form_data.append("menu_id", document.getElementById('menu_id').value);

   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"insert_new_menu.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,   
    success:function(data)
    {
    	if(data == 0){
    		$('#alerts').html("<center><label class='text-danger'>กรอกข้อมูลให้ครบและถูกต้อง</label></center>");
    	}else if(data ==1){
    		$('#alerts').html("<center><label class='text-success'>Insert data success</label></center>");
    		$('.main_page').load('menu.php');
    	}else{
    		$('#alerts').html(data);
    	}
      }
   }); 
 });
});
/************************onChenge*********************/
$(document).ready(function(){
 $(document).on('change', '#file', function(){

  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }else{
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"uploadimage.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     	$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(result)
    {
     	$('#uploaded_image').html(result);
    }
   }); 
  }
 });
});
/*/***************************************************/
function edit_menu(id){
	 $.ajax({
          type:"POST",
          cache:false,
          url:"fethdata.php",
          data:{
            id:id,
            key:'fetch',
          },
          dataType:'json',
          success:function (data){
          	  $('#ADD_memuss').modal('show');
              $('#menu_name').val(data.Pd_name);
      			  $('#menu_price').val(data.Price);
      			  $('#Type_menu').val(data.Type);
      			  $('#uploaded_image').html('<center><img src="product_img/'+data.image+'" height="150" width="225" class="img-thumbnail" /></center>');
      			  $('#status_ubdate').val('update');
      			  $('#menu_id').val(data.id);
              $('#alerts').html("");  
            }
      }); 
}
/***********************************************************/
function clearFrom(){
	$('#status_ubdate').val(''); 
	$('#menu_name').val('');
	$('#menu_price').val('');
	$('#Type_menu').val(0);
	$('#file').val('');
	$('#alerts').html('');
	$('#uploaded_image').html('');
}
/**********************delete_menu****************/
function del_menu(ids){
  var id = 'image_name'+ids.toString();
  var img_n = document.getElementById(id).value;
	$.ajax({
          type:"POST",
          cache:false,
          url:"delete_menu.php",
          data:{
            id:ids,
            key:'delete_menu',
            image: img_n,
          },
          success:function (){
      		    $('.main_page').load('menu.php');
            }
       }); 
}
/*****************************************************/
function VieW_address(address){
    $('#aert_modal').modal('show');
    $("#message").html("<center><h5>"+address+"</h5></center>");
}

function VieW_Menu_list(ids,class_n){
  $.ajax({
          type:"POST",
          cache:false,
          url:"fetch_menu_list.php",
          data:{
            id:ids,
            Rf_n:class_n,
            key:'fecth_menu_list',
          },
          success:function (result){
            $('#aert_modal_menu_list').modal('show');
             $("#fecth_menu_content").html(result);
            }
       }); 
}
/***************************************************************/
function update_cook_status(ids,class_n){
  var user_id_s = document.getElementById('_user_ID').value;
  var rf_n = document.getElementById('RF_n').value;
  $.ajax({
          type:"POST",
          cache:false,
          url:"update_status.php",
          data:{
            id:ids,
            key:class_n,
            user:user_id_s,
            rf_n:rf_n,
          },
          success:function (_data_result){
             if(_data_result ==1){
              $('#add_new_b'+ids).html("<a class = 'cooking_' id = '"+ids+"' onClick='update_cook_status(this.id,this.className); return false;'>\
                กำลังทำ</a>&nbsp<i style ='' class='fas fa-cog fa-spin'></i>"); 
              }else if(_data_result ==2){
                $('#add_new_b'+ids).html("<a class = 'cook_success' id = '"+ids+"' onClick='update_cook_status(this.id,this.className); return false;'>\
                ทำเส็จแล้ว</a>&nbsp<i class='fa fa-check' aria-hidden='true'></i>"); 
              }else{
                $('#add_new_b'+ids).html("<a class = 'cook_success' id = '"+ids+"'>รอส่ง</a>&nbsp<i class='fas fa-box'></i>");
              }
              $('.main_page').load('Order_list.php');
            }
       })
}

$("#btn_send_s").on('click',function(){
    var User_id = document.getElementById('_user_ID').value;
    var Ref_no = document.getElementById('RF_n').value;
    $.ajax({
          type:"POST",
          cache:false,
          url:"send_order.php",
          data:{
            User_id:User_id,
            Ref_no:Ref_no,
          },
          success:function (result_s){
                alert(result_s);
            }
       });
})
     