<?php 
session_start();
?>
<nav class="navbar navbar-expand-lg" id = "navbar2">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link Coffee" href="javascript:void(0)">Coffee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link Cake" href="javascript:void(0)">Cake</a>
      </li>
      &nbsp&nbsp&nbsp
      <li class="nav-item cart_logo">
        <img id = "cart_logo"src="/Include/images/cart.png" width="40" height="40" class="d-inline-block align-top" alt="" onClick="_Cart_table(); return false;">
      </li>
      <span class="badge">0</span> 
    </ul>
    <?php 
        if($_SESSION['@_$username'] != ''){
          echo '<a id = "L_user" onClick="link_Logut(); return false;" class="nav-link" href="javascript:void(0)">คุณ:&nbsp'.$_SESSION['@_$F_name'].'</a>';
        }else if($_SESSION['@_$ADDS_USERNAME'] != '' and $_SESSION['status_@_admin'] == 9){
                echo '
                  <a id = "L_admin1" class="nav-link" href="OoadminoO/">Admin</a>&nbsp
                  <a id = "L_admin2" onClick="link_Logut(); return false;" class="nav-link" href="javascript:void(0)">แอดมิน:&nbsp'.$_SESSION['@_$ADDS_USERNAME'].'</a>'; 
        }else{
          echo '
                  <a  id ="Login" onClick="link_login(); return false;" class="nav-link " href="javascript:void(0)">Login</a>
                  <a id ="Register" onClick="link_register(); return false;" class="nav-link" href="javascript:void(0)">Register</a>';
        }
      ?>
  </div>
</nav>