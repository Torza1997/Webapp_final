/***********************************************************/
 $(document).ready(function(){
 	$(".home").load("content/coffee.php");
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

