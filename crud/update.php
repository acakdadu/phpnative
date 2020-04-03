 <?php  
	// Connection and Helper
	$link = mysqli_connect('localhost','root','', 'phpnative'); 
  require_once('../config/helper.php');


	// Attempt select query execution
	$sql = "SELECT * FROM persons";
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
	    		$data = [];
	        while($row = mysqli_fetch_assoc($result)){
	            $data[] = $row;
	        }
	        // Free result set
	        mysqli_free_result($result);
	    } else{
	    	$data[] = null;
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);
	$data = $data[array_rand($data)];

	// Message for empty data
	if(count($data) == 0){
?>

<div class="alert alert-warning fs-5" role="alert">
  <b>Warning: </b> Belum ada data untuk saat ini, silahkan masukan pada menu create.
</div>

<?php  
	}
?>

<!-- Message for success -->
<div class="alert alert-warning alert-success fs-5" role="alert" style="display: none;">
  <b>Success: </b> Your data has been updated,  please check at read page at navbar.
</div>

<!-- Message for error -->
<div class="alert alert-danger alert-error fs-5" role="alert" style="display: none;">
  <b>Failed: </b> Sorry, you have an problem: <br><br><code><span class='alert-error-data'>Oops! Something went wrong. Please try again later.</span></code>
</div>

<form>
  <div class="form-group">
    <label for="readID">ID</label>
    <input type="text" name="id" class="form-control disabled" id="readID" aria-describedby="idHelp" value="<?= $data['id']; ?>" readonly>
    <small id="idHelp" class="form-text text-muted">Random data persons, only for update.</small>
  </div>
  <div class="form-row">
    <div class="col">
      <div class="form-group">
        <label for="inputFirstName">Firts Name</label>
        <input type="text" name="first_name" class="form-control" id="inputFirstName" value="<?= $data['first_name']; ?>" required>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="inputLastName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="inputLastName" value="<?= $data['last_name']; ?>" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" value="<?= $data['email']; ?>" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
	<div class="custom-control custom-switch mb-3">
	  <input type="checkbox" class="custom-control-input" id="checkActive" <?php if($data['active']){ echo 'checked'; } ?>>
	  <label class="custom-control-label" for="checkActive">Active</label>
	</div>

  <button type="button" class="btn btn-block btn-warning" id="update">Update</button>
</form>


<script>
  $('#update').click(function(){

    // AJAX Method
    $.post("config/functions/update.php", {
      id: $('#readID').val(),
      first_name: $('#inputFirstName').val(),
      last_name: $('#inputLastName').val(),
      email: $('#inputEmail').val(),
      active: $('#checkActive').is(':checked')
    }, function(data, status){
      if (data == 'Records were updated successfully'){
        $('.alert-success').fadeIn();
      } else {
        $('.alert-error-data').text(data);
        $('.alert-error').fadeIn();
      }
    });

  });
</script>