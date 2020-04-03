<!-- Message for success -->
<div class="alert alert-warning alert-success fs-5" role="alert" style="display: none;">
  <b>Success: </b> Your data has been created,  please check at read page at navbar.
</div>
<!-- Message for error -->
<div class="alert alert-danger alert-error fs-5" role="alert" style="display: none;">
  <b>Failed: </b> Sorry, you have an problem: <br><br><code><span class='alert-error-data'>Oops! Something went wrong. Please try again later.</span></code>
</div>

<form>
  <div class="form-row">
    <div class="col">
      <div class="form-group">
        <label for="inputFirstName">Firts Name</label>
        <input type="text" name="first_name" class="form-control" id="inputFirstName" required>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="inputLastName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="inputLastName" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="custom-control custom-switch mb-3">
    <input type="checkbox" class="custom-control-input" id="checkActive" checked>
    <label class="custom-control-label" for="checkActive">Active</label>
  </div>
  <button type="button" class="btn btn-block btn-success" id="create">Create</button>
</form>


<script>
  $('#create').click(function(){
    // AJAX Method
    $.post("config/functions/create.php", {
      first_name: $('#inputFirstName').val(),
      last_name: $('#inputLastName').val(),
      email: $('#inputEmail').val(),
      active: $('#checkActive').is(':checked')
    }, function(data, status){
      if (data == 'Records inserted successfully.'){
        $('.alert-success').fadeIn();
        $('.form-control').val('');
      } else {
        $('.alert-error-data').text(data);
        $('.alert-error').fadeIn();
      }
    });
  });
</script>