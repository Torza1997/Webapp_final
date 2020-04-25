<?php 
session_start();
?>
<nav class="navbar navbar-expand-lg" id = "navbar2">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
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
      <?php 
        if($_SESSION['@_$username'] != ''){
          echo '
                <li id ="Logut" class="nav-item ">
                  <a id = "L_user" onClick="link_Logut(); return false;" class="nav-link" href="javascript:void(0)">คุณ:&nbsp'.$_SESSION['@_$username'].'</a>
                </li>';
        }else if($_SESSION['@_$ADDS_USERNAME'] != '' and $_SESSION['status_@_admin'] == 9){
                echo '
                <li id ="Logut_admin" class="nav-item ">
                  <a id = "L_admin" class="nav-link" href="OoadminoO/">Admin</a>
                </li>&nbsp
                <li class="nav-item ">
                  <a id = "L_admin" onClick="link_Logut(); return false;" class="nav-link" href="javascript:void(0)">แอดมิน:&nbsp'.$_SESSION['@_$ADDS_USERNAME'].'</a>
                </li>'; 
        }else{
          echo '<li id ="Login" class="nav-item ">
                  <a  onClick="link_login(); return false;" class="nav-link " href="javascript:void(0)">Login</a>
                </li>
                 <li id ="Register" class="nav-item ">
                  <a onClick="link_register(); return false;" class="nav-link" href="javascript:void(0)">Register</a>
                </li>';
        }
      ?>
    </ul>
  </div>
</nav>