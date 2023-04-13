<?php
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM classes where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-class">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="level" class="control-label">Form</label>
			<input type="text" class="form-control form-control-sm" name="level" id="level" value="<?php echo isset($level) ? $level : '' ?>">
		</div>
		<div class="form-group">
			<label for="section" class="control-label">Class Name</label>
			<input type="text" class="form-control form-control-sm" name="section" id="section" value="<?php echo isset($section) ? $section : '' ?>">
		</div>
		<div class="card-footer">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-class">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=classes">Cancel</a>
  		</div>
  	    </div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-class').submit(function(e){
			e.preventDefault();
			start_load()
			$('#msg').html('')
			$.ajax({
				url:'ajax.php?action=save_class',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Class already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

	const form = document.getElementById('manage-class');
        form.addEventListener('submit', function(event) {
        event.preventDefault(); // prevent the form from submitting normally
    // Perform your form data submission here using Ajax or fetch API
    // After the form data is saved, redirect the user to another page
      window.location.href = './index.php?page=classes';
  });

</script>