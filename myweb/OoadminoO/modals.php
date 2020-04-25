<!-- Modal -->
<div class="modal fade" id="ADD_memuss" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">เพิ่มเมนูใหม่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #D1FF00">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button id = "clear" type="button" class="btn btn-secondary ">clear</button>
        <button type="button" class="btn btn-secondary " data-dismiss="modal">ออก</button>
        <button id = "submit_add_menu"  type="button" class="btn btn-secondary ">เพิ่ม</button>
      </div>
    </div>
  </div>
</div>