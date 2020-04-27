<!-- Modal alert-->
<div class="modal fade" id = "aert_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 5px solid #000000;">
        <button style="color: #D1FF00" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id = "message" >
        
      </div>
      <div class="modal-footer" style="border-top: 5px solid #000000; height: 50px">
        <!--<button style="color: black;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
    </div>
  </div>
</div>

<!-- Modal register-->
<div class="modal fade" id = "regis_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 5px solid #000000;">
        <button style="color: #D1FF00" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><h4 style="color: #D1FF00">REGISTER</h4></center>
      <div class="modal-body" style="color: #D1FF00">
        <form id ="_user_register" >
            <div class="row">
              <div class="form-group col-4">
                <label class ="F_name" for="F_name">ชื่อ</label>
                <input type="text" id="F_name" name="F_name" placeholder="ชื่อ">
              </div>
              <div class="form-group col-4">
                <label class = "L_name" for="L_name">นามสกุล</label>
                <input type="text" id="L_name" name="L_name" placeholder="นามสกุล">
              </div>
            </div>
             <div class="row">
              <div class="form-group col-4">
                <label class ="user_name" for="user_name">Username</label>
                <input type="text" id="user_name" name="user_name" placeholder="username">
                <span id="alert2"></span>
              </div>
              <div class="form-group col-4">
                <label class = "user_pw" for="user_pw">Password</label>
                <input type="password" id="user_pw" name="user_pw" placeholder="password">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-4">
                <label class ="user_email" for="user_email">Email</label>
                <input type="email" id="user_email" name="user_email" placeholder="Email">
                <span id="alert3"></span>
              </div>
              <div class="form-group col-4">
                <label class = "user_phone" for="user_phone">Phone</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Phone">
                 <span id="alert4"></span>
              </div>
            </div>
           <div class="form-group">
              <label class = "user_address" for="user_address">ที่อยู่</label><br>
              <textarea id = "user_address" rows="4" cols="50" name="user_address" form="_user_register" placeholder="Enter address"></textarea>
            </div>
            <span id="alert1"></span>
          </form>
      </div>
      <div class="modal-footer" style="border-top: 5px solid #000000;">
        <button id = "regis_submit" style="color: black;" type="button" class="btn btn-secondary">Sign in</button>
        <button style="color: black;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal register-->
<div class="modal fade" id = "login_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 5px solid #000000;">
        <button style="color: #D1FF00" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><h4 style="color: #D1FF00">LOGIN</h4></center>
      <div class="modal-body" style="color: #D1FF00">
         <form id ="_user_login">
          <div class="form-group">
            <label for="Username_login" class="col-form-label">Username: </label>
            <input type="text"  id="Username_login" name = "Username_login" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="userPassword_login" class="col-form-label" >Password: </label>
            <input type="password"  id="userPassword_login" name = "userPassword_login"  placeholder="Password">
          </div>
        </form>
      </div>
      <span id="Login_alert"></span>
      <div class="modal-footer" style="border-top: 5px solid #000000;">
        <button id ="_user_login_submit" style="color: #000000" type="button" class="btn btn-secondary">Login</button>
        <button style="color: black;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

