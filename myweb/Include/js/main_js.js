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
