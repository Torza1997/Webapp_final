
<?php  
    include '../connect_db.php';
   ?>
<div class="row row1">
    <?php
      $sql = "SELECT * FROM Product WHERE Type = 0 "; 
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-3">
        <div class="card" style="width: 15rem;">
        <img src="/Include/images/<?php echo($row['image']);?>" class="card-img-top" alt="..." style="width: auto; height:200px">
        <div class="card-body" >

          <form action="javascript:void(0)">
          <center>
            <h5 id = "name<?php echo($row['id']);?>" class="card-title"><?php echo($row['Pd_name']);?></h5>
            <p class="card-text">ราคา <?php echo($row['Price']);?> บ.</p>
            <p style="display: none" id = "price<?php echo($row['id']);?>" class="card-text"><?php echo($row['Price']);?></p>
             <button class="btn buttons">-</button>
             <input id="quantity<?php echo($row['id']);?>" type="text" name="quantity" value="1" class="form-control">
             <button class="btn buttons">+</button>
            <a id = "<?php echo($row['id']);?>" onClick="getids(this.id); return false;" href="javascript:void(0)" class="btn adds">สั่งกาแฟ</a>
          </center>
          <form>
        </div>
        </div>
      </div>

      <?php  
        }
       }
      ?>
</div>
<script type="text/javascript">
$(".buttons").on( "click", function() {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
     // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }

    $button.parent().find("input").val(newVal);
});
</script>