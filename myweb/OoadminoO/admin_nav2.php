<?php 
session_start();
$_SESSION["cook_status_"] = 0;
?>
<nav class="navbar navbar-expand-lg" id = "navbar2">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link Cook" href="javascript:void(0)">Cook</a>
      </li>
      <li class="nav-item">
        <a class="nav-link Cooking" href="javascript:void(0)">Cooking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link Cooking_success" href="javascript:void(0)">Cook Success</a>
      </li>
    </ul>
  </div>
</nav>
<script type="text/javascript">
      $('.Cook').click(function(){
          $.ajax({
            type:"POST",
            cache:false,
            url:"Set_cook_status.php",
            data:{
              Status:0,
            },
            success:function (){
                $('.main_page').load('Order_list.php');
              }
         }); 
      });


      $('.Cooking').click(function(){
        $.ajax({
            type:"POST",
            cache:false,
            url:"Set_cook_status.php",
            data:{
              Status:1,
            },
            success:function (){
                $('.main_page').load('Order_list.php');
              }
         });

      });

      $('.Cooking_success').click(function(){
          $.ajax({
            type:"POST",
            cache:false,
            url:"Set_cook_status.php",
            data:{
              Status:2,
            },
            success:function (){
                $('.main_page').load('Order_list.php');
              }
         });
      });
</script>