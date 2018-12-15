<div class="container mt-3">
	<form class="form-group" action="<?php echo DOCROOT.'/classes/'?>delete-member.class.php" method="POST">
		<input type="text"   name="user_name" placeholder="Enter The Name number" class="form-control col-md-4 offset-md-4" required="required">
		<input type="text"   name="user_reg"  placeholder="Enter The Register number" class="form-control col-md-4 offset-md-4" required="required">
		<input type="submit" name="submit"    value="Delete" class="btn btn-danger col-md-4 offset-md-4">
	</form>
</div>