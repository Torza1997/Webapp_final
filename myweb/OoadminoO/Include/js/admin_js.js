$(document).ready(function(){
  $('#load_nav2').load('admin_nav2.php');
  $('.main_page').load('Order_list.php');
});

$('#menu').on('click',function(){
  $('#load_nav2').html('');
	$('.main_page').load('menu.php');
});

$('#Sales').on('click',function(){
  $('#load_nav2').html('');
  $('.main_page').load('graph_sales.php');
});

$('#order_list').on('click',function(){
  $('.main_page').load('Order_list.php');
  $('#load_nav2').load('admin_nav2.php');
});

$('#Add_admin').on('click',function(){
  $('#load_nav2').html('');
  $('.main_page').load('admin_list.php');
});

$('#Upload_images').on('click',function(){
  $('.main_page').load('Images_header.php');
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


$(document).ready(function(){
 $(document).on('change', '#file_head', function(){

  var name = document.getElementById("file_head").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }else{
   form_data.append("file", document.getElementById('file_head').files[0]);
   $.ajax({
    url:"uploadimage_header.php",
    method:"POST",
    key:'head',
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      
    },   
    success:function(result)
    {
      $('.main_page').load('Images_header.php');
    }
   }); 
  }
 });
});


$(document).ready(function(){
 $(document).on('change', '#file_right', function(){

  var name = document.getElementById("file_right").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }else{
   form_data.append("file", document.getElementById('file_right').files[0]);
   $.ajax({
    url:"uploadimage_right.php",
    method:"POST",
    key:'right',
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      
    },   
    success:function(result)
    {
      $('.main_page').load('Images_header.php');
    }
   }); 
  }
 });
});
/*************************************************/
function Delete_head_image(ids,img){
  $.ajax({
          type:"POST",
          cache:false,
          url:"delete_image.php",
          data:{
            id:ids,
            key:'delete_image',
            img:img,
          },
          success:function (){
              $('.main_page').load('Images_header.php');
            }
       })
}


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
/***********************************************************/
function  comfirm_send_order(){
          $('#message').html('<center> \
                              <h5>คุณต้องการส่งออร์เดอร์ทั้งหมดหรือไม่</h5> \
                              <button onClick="send_order_success(); return false;" type="button" class="btn" style="margin-top: 2%;color: #D1FF00; ">ใช่</button> \
                              <button style="color: #D1FF00; margin-top: 2%;" type="button" class="btn" data-dismiss="modal">ไม่</button>\
                              </center>');
          $('#aert_modal').modal('show');
}
function send_order_success(){
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
                if(result_s == 1){
                  $('#aert_modal_menu_list').modal('hide');
                  $('#message').html('<center><h5 style ="color: #ffffff;">ส่งสิ้นค้าเร็จแล้ว</h5></center>');
                  $('#aert_modal').modal('show');
                }else if(result_s == 2){
                  $('#aert_modal_menu_list').modal('hide');
                  $('#message').html('<center><h5 style ="color: #ffffff;">SQL Error</h5></center>');
                  $('#aert_modal').modal('show');
                }
                $('.main_page').load('Order_list.php');
            }
       });
}
     
/*******************************************************/
function  comfirm_delete_order(Rf_n){
          $('#message').html('<center> \
                              <h5>คุณต้องการจะลบออร์เดอร์ทั้งหมดหรือไม่</h5> \
                              <button onClick="admin_delete_order('+Rf_n+'); return false;" type="button" class="btn" style="margin-top: 2%;color: #D1FF00; ">ใช่</button> \
                              <button style="color: #D1FF00; margin-top: 2%;" type="button" class="btn" data-dismiss="modal">ไม่</button>\
                              </center>');
          $('#aert_modal').modal('show');
}

function admin_delete_order(Rf_n){
    $.ajax({
          type:"POST",
          cache:false,
          url:"admin_delete_order.php",
          data:{
            key:"delete_order_all",
            Ref_no:Rf_n,
          },
          success:function (result_s){
                if(result_s == 1){
                  $('#aert_modal_menu_list').modal('hide');
                  $('#message').html('<center><h5 style ="color: #ffffff;">ลบออร์เดอร์ทั้งหมดแล้ว</h5></center>');
                  $('#aert_modal').modal('show');
                }else if(result_s == 2){
                  $('#aert_modal_menu_list').modal('hide');
                  $('#message').html('<center><h5 style ="color: #ffffff;">SQL Error</h5></center>');
                  $('#aert_modal').modal('show');
                }
                $('.main_page').load('Order_list.php');
            }
       });
}

/////////////////////////////////////////////////////////////////////////

function admin_delete_oder_one(memu_id){
   var User_id = document.getElementById('_user_ID').value;
   var Ref_no = document.getElementById('RF_n').value;
    $.ajax({
          type:"POST",
          cache:false,
          url:"admin_delete_order.php",
          data:{
            key:"admin_delete_order",
            Ref_no:Ref_no,
            User_id:User_id,
            memu_id:memu_id,
          },
          success:function (result_s){
               if(result_s == 1){
                  $('#aert_modal_menu_list').modal('hide');
                  $('#message').html('<center><h5 style ="color: #ffffff;">ลบออร์เดอร์แล้ว</h5></center>');
                  $('#aert_modal').modal('show');
                }else if(result_s == 2){
                  $('#aert_modal_menu_list').modal('hide');
                  $('#message').html('<center><h5 style ="color: #ffffff;">SQL Error</h5></center>');
                  $('#aert_modal').modal('show');
                }
                $('.main_page').load('Order_list.php');
            }
       });
}
/*********************admin****************************/
function delete_admin_user(ids){
  $.ajax({
          type:"POST",
          cache:false,
          url:"delete_admin.php",
          data:{
            id:ids,
            key:'delete_admin',
          },
          success:function (result){
              $('#message').html('<center><h5 style ="color: #ffffff;">'+result+'</h5></center>');
              $('#aert_modal').modal('show');
              $('.main_page').load('admin_list.php');
           }
       }); 
}

function add_admin(ids){
  claerRegisfrom();
  $('#regis_admin_modal').modal('show');
}

function claerRegisfrom(){
  $("#F_name").val('');$("#L_name").val('');
  $("#user_name").val('');$("#user_pw").val('');
  $("#user_phone").val('');
}

$("#regis_admin").click(function(){
    var data_login = $("#admin_regis").serialize();
    $.ajax({
          type:"POST",
          cache:false,
          url:"regis_admin.php",
          data:data_login,
          success: function (result){
              if(result == 1){
                  $("#alert3").html("");$("#alert5").html("");$("#alert2").html("");
                  $("#alert1").html("<p style = 'color:red; margin-left:6% ;font-size:80%;'>กรุณากรอกข้อมูลให้ครับ</p>");
                }else if(result == 2){
                  $("#alert1").html("");$("#alert5").html("");
                  $("#alert3").html("<p id ='P_s1'>ตัวเลขเบอร์โทร 10 หลัก</p>");
                }else if(result == 3){
                  $("#alert1").html("");$("#alert5").html("");
                  $("#alert3").html("");
                  $("#alert2").html("<p id ='P_s1'>ใส่อักษรพิเสษด้วย @/%&$</p>");
                }else if(result == 6){
                  $("#alert1").html("");$("#alert2").html("");
                  $("#alert3").html("");
                  $("#alert5").html("<p style = 'color:#D1FF00; margin-left:6% ;font-size:80%;'>Success</p>");
                  claerRegisfrom();
                  $('.main_page').load('admin_list.php');
                }else if(result==5){
                  $("#alert1").html("");$("#alert2").html("");
                  $("#alert3").html("");
                  $("#alert5").html("<p style = 'color:red; margin-left:6% ;font-size:80%;'>user นี้มีคนใช้แล้ว</p>");
                }else{
                  $("#alert1").html("");
                  $("#alert3").html("");
                  $("#alert5").html("");
                  $("#alert2").html("");
                }
                
            }
       });
});


