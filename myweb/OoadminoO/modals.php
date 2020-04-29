<!-- Modal -->
<div class="modal fade" id="ADD_memuss" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content">
      <div class="modal-header modal_header">
        <h5 class="modal-title">เพิ่มเมนูใหม่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #D1FF00">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_body">
        <form id ="add_menu_new" method="post" action="javascript:void(0)" enctype="multipart/form-data">
          <div class="form-group">
            <label for="menu_name" class="col-form-label">ชื่อเมนู:</label>
            <input type="text" class="form-control" name = "menu_name" id="menu_name">
          </div>
          <div class="form-group">
            <label for="menu_price" class="col-form-label">ราคา:</label>
            <input type="number" class="form-control" name = "menu_price" id="menu_price">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="Type_menu">เลือกประเภทเมนู</label>
            <select class="custom-select mr-sm-2" name = "Type_menu" id="Type_menu">
              <option value="0">Coffee</option>
              <option value="1">Cake</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image_menu">เลือกรูป</label>
            <span id="uploaded_image"></span>
            <input type="file" class="form-control-file" name="file" id="file">
          </div>
          <input type="hidden" name="status_ubdate" id="status_ubdate">
          <input type="hidden" name="menu_id" id="menu_id">
         <span id="alerts"></span>
        </form>
      </div>
      <div class="modal-footer modal_footer">
        <button id = "clear" type="button" class="btn btn-secondary ">clear</button>
        <button type="button" class="btn btn-secondary " data-dismiss="modal">ออก</button>
        <button id = "submit_add_menu"  type="button" class="btn btn-secondary ">เพิ่ม</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal alert-->
<div class="modal fade" id = "aert_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_alert">
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

<!-- Modal view menu list-->
<div class="modal fade" id = "aert_modal_menu_list">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_content_alert_menu_list">
      <div class="modal-header" style="border-bottom: 5px solid #ffffff;">
        <button style="color: #D1FF00" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
        <div class="col-2"> <img src="/Include/images/logo.png" width="70" height="70" class="d-inline-block align-top" alt="" style="text-align: center;margin-left: 120%;margin-top: -30%;"></div>
        <div class="col-8">
          <center> 
          <input id = "_user_ID" type="hidden" name="user_ID">
          <input id = "RF_n" type="hidden" name="RF_n"><h4 id ="User_name_s" style="color:black;text-align: center;"> </h4>
        </center>
      </div>
      </div>
      <div class="modal-body" id = "message" >
          <table class="table table-hover table_style_order">
            <thead class="cart_table_header">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col"><center>ยกเลิก</center></th>
              </tr>
            </thead>
            <tbody id = "fecth_menu_content">
                
            </tbody>
          </table>
      </div>
      <div class="modal-footer" style="border-top: 5px solid #ffffff; height: 50px">
        <!--<button style="color: black;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      </div>
    </div>
  </div>
</div>


<!-- Modal register-->
<div class="modal fade" id = "regis_admin_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content content_bg">
      <div class="modal-header" style="border-bottom: 5px solid #000000;">
        <button style="color: #D1FF00" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><h4 style="color: #D1FF00">REGISTER</h4></center>
      <div class="modal-body" style="color: #D1FF00">
        <form id ="admin_regis" >
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
                <label class = "user_phone" for="user_phone">Phone</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Phone">
                 <span id="alert3"></span>
              </div>
            </div>
            <span id="alert1"></span>
          </form>
          <span id="alert5"></span>
      </div>
      <div class="modal-footer" style="border-top: 5px solid #000000;">
        <button id = "regis_admin" style="color: black;" type="button" class="btn btn-secondary">Sign in</button>
        <button style="color: black;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>