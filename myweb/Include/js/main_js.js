/***************************click********************************/
$(document).ready(function(){

 	$(".home").load("content/coffee.php");
 	$(".show").load("content/show_oder.php");

	$(".Coffee").click(function(){
	   $(".home").load("content/coffee.php");
	});

	$(".Cake").click(function(){
	   $(".home").load("content/cake.php");
	});
});
 
/***********************************************************/
window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("fixed-top")
  } else {
    navbar.classList.remove("fixed-top");
  }
}

/*********************************************************/
function getids(ids){
      var produc = document.getElementById("name"+ids.toString()).textContent;
      var price = document.getElementById("price"+ids.toString()).textContent;
      var quantity = document.getElementById("quantity"+ids.toString()).value;
      var id = ids;
       $.ajax({
          type:"POST",
          cache:false,
          url:"session_cart.php",
          data:{
            id:id,
            produc: produc,
            price: price,
            quantity: quantity,
          },
          success: function (){
            $(".show").load("content/show_oder.php");
          }
        });
  }
  /***********************************************************/
function _Cart_table(){
  $(".home").load("content/cart_table.php");
}
/**********************************************************/
function Delete(id){
      var id = id;
       $.ajax({
          type:"POST",
          cache:false,
          url:"uset_session.php",
          data:{
            id:id,
            key:'Delete',
          },
          success: function (){
              console.log("Delete success");
              $(".show").load("content/show_oder.php");
              $(".home").load("content/cart_table.php"); 
            }
       }); 
  };
  /***************************************************/
$(document).ready(function(){
  $('#search_menu').keyup(function(){
    var key_text = $(this).val();
    console.log(key_text);
    if(key_text != ''){
      $.ajax({
        url:'search.php',
        method:'post',
        data:{search:key_text},
        dataType:"text",
        success:function(data){
          $('#home').html(data);
        }
      });
    }else{
      $(".home").load("content/coffee.php");
    }
  });

});
/*********************************************************/
$('#link_home').click(function(){
  $(".home").load("content/coffee.php");
});
$('#link_contrac').click(function(){
  alert('ไว้ทำหน้า ติดต่อ');
});
/***********************************/
function alert_(){
  $('#aert_modal').modal('show');
  $("#message").html(' \
    <center><h5>คุณยังไม่ล็อคอิน กรุณาล็อคอินก่อนสั่งซื้อ</h5></center> \
    <center><a onClick="link_login(); return false;" style="color: #D1FF00; display: inline;" href = "javascript:void(0)">Login</a> &nbsp &nbsp \
    <a onClick="link_register(); return false;" style="color: #D1FF00;display: inline;" href = "javascript:void(0)">Register</a></center> \
    ');
}
/*******************************************************/
function link_login(){
  $('#aert_modal').modal('hide');
  $("#message").html('');
  $('#login_modal').modal('show');
}

function link_register(){
  $('#aert_modal').modal('hide');
  $("#message").html('');
  $('#regis_modal').modal('show');
}
/*****************************************************/

/************register****************************/
$("#regis_submit").click(function(){
  var data = $("#_user_register").serialize();
  $.ajax({
          type:"POST",
          cache:false,
          url:"register.php",
          data:data,
          success: function (result){
            console.log(result);
                if(result == 1){
                  $("#alert2").html("");$("#alert3").html("");$("#alert4").html("");
                  $("#alert1").html("<p style = 'color:red; margin-left:6% ;font-size:80%;'>กรุณากรอกข้อมูลให้ครับ</p>");
                }else if(result==2){
                  $("#alert1").html("");
                  $("#alert2").html("<p id ='P_s'>ตัวอักษรตามด้วยตัวเลข</p>");
                  $("#alert3").html("<p id ='P_s'>example@_mail.com</p>");
                  $("#alert4").html("<p id ='P_s1'>ตัวเลขเบอร์โทร 10 หลัก</p>");
                }else if(result==3){
                  $("#alert1").html("");$("#alert2").html("");$("#alert4").html("");
                  $("#alert3").html("<p id ='P_s'>example@_mail.com</p>");
                }else if(result==4){
                  $("#alert1").html("");$("#alert3").html("");$("#alert4").html("");
                  $("#alert2").html("<p id ='P_s'>ตัวอักษรตามด้วยตัวเลข</p>");
                }else if(result==5){
                  $("#alert2").html("");$("#alert3").html("");$("#alert4").html("");
                  $("#alert1").html("<p style = 'color:green; margin-left:6% ;font-size:80%;'>Success!</p>");
                  claerRegisfrom();
                  $('#regis_modal').modal('hide');
                }else if(result==7){
                  $("#alert1").html("");$("#alert2").html("");$("#alert3").html("");
                  $("#alert4").html("<p id ='P_s1'>ตัวเลขเบอร์โทร 10 หลัก</p>");
                }else if(result==6){
                  $("#alert2").html("");$("#alert3").html("");$("#alert4").html("");
                  $("#alert1").html("<p style = 'color:red; margin-left:6% ;font-size:80%;'>Register fail!</p>");
                }else if(result==8){
                  $("#alert2").html("");$("#alert3").html("");$("#alert4").html("");
                  $("#alert1").html("<p style = 'color:red; margin-left:6% ;font-size:80%;'>user นี้มีคนใช้แล้ว</p>");
                }else{
                  $("#alert1").html("");$("#alert2").html("");$("#alert3").html("");$("#alert4").html("");
                }
            }
       });
})
function claerRegisfrom(){
  $("#F_name").val('');$("#L_name").val('');
  $("#user_name").val('');$("#user_pw").val('');
  $("#user_email").val('');$("#user_phone").val('');
  $("#user_address").val('');
}

/***************************login*************************/
$("#_user_login_submit").click(function(){
    var data_login = $("#_user_login").serialize();
    $.ajax({
          type:"POST",
          cache:false,
          url:"login.php",
          data:data_login,
          success: function (result){
              if(result == 1){
                claerLoginFrom();
                $('#login_modal').modal('hide');
                location.reload();
              }else{
                $("#Login_alert").html("<p style = 'color:red; margin-left:24% ;font-size:80%;margin-top:-5%'>Login fail!</p>");
                claerLoginFrom();
              }
            }
       });
});

function claerLoginFrom(){
  $("#Username_login").val('');$("#userPassword_login").val('');
}
function link_Logut(){
    $('#aert_modal').modal('show');
    $("#message").html(' \
      <center><h5>คุณต้องการออกจากระบบ</h5></center> \
      <center><a onClick="link_Logut_session(); return false;" style="color: #D1FF00; display: inline;" href = "javascript:void(0)">Logout</a> &nbsp &nbsp');
}
function link_Logut_session(){
   $.ajax({
          type:"POST",
          cache:false,
          url:"logout.php",
          data:{
            key:'logout',
          },
          success: function (result){
              if(result == 1){
                $("#message").html('<center><h5>ออกจากระบบแล้ว</h5></center>');
                location.reload();
              }else{
                $("#message").html('<center><h5>Loguot Fail!</h5></center>');
              }
            }
       });
}

/****************insert_order**************************/
function confirm_insert_orders(){
  $('#aert_modal').modal('show');
  $("#message").html('<center> \
                      <h5>คุณต้องการสั่งซื้อทั้งหมดใช่หรือไม่</h5> \
                      <button onClick="insert_orders(); return false;" type="button" class="btn" style="margin-top: 2%">ใช่</button> \
                      <button style="color: black; margin-top: 2%;" type="button" class="btn" data-dismiss="modal">ไม่</button>\
                    </center>');
}
function insert_orders(){
  $.ajax({
          type:"POST",
          cache:false,
          url:"insert_order.php",
          data:{
            key:'Insert_order',
          },
          success: function (result_order){
             if(result_order == 1){
                $("#message").html('<center><h5>สั่งซื้อเรียบร้อย</h5> \
                  <a style=" /*text-decoration: none;*/ color: #D1FF00" href="MY_bills/mybill.pdf">ดาว์โหลดใบเสร็จ</a></center>');
              }else{
                $("#message").html('<center>\
                  <h5>สั่งซื้อไม่สำเร็จ</h5>\
                  <a style=" /*text-decoration: none;*/ color: #D1FF00" href="https://www.instagram.com/t.tor.thanatos/">ติดต่อสอบถามได้ทางเพจ</a>\
                  </center>');
              }
        }
   });
}

