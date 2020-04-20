<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inert data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insert.php" method="post">
	  <div class="form-group">
	    <label >Full name</label>
	    <input type="text" name = "Full_name" class="form-control" placeholder="Enter Full name">
	  </div>
	  <div class="form-group">
	    <label >Phone</label>
	    <input type="text" name = "Phone"class="form-control" placeholder="Enter Phone">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email</label>
	    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
      </div>
    </div>
  </div>
</div>
