<div class="container mt-3">
	<form class="form-group" action="<?php echo DOCROOT.'/classes/'?>delete-member.class.php" method="POST">
		<input type="text"   name="user_name" placeholder="Enter The User Name " class="form-control col-md-4 offset-md-4" required="required">
		<input type="text"   name="user_reg"  placeholder="Enter The Register number" class="form-control col-md-4 offset-md-4" required="required">
		<input type="submit" name="submit"    value="Delete" class="btn btn-danger col-md-4 offset-md-4">
	</form>
	<div id="msg"></div>
</div>
<script type="text/javascript">
	let searchParams = new URLSearchParams( window.location.href );
	let val          = searchParams.get("msg");
	var div          = document.getElementById("msg");
	if(val === 'yes'){
		//display succ msg
		div.classList.add("alert");
		div.classList.add("alert-success");
		div.innerHTML = "Success";
		setTimeout(function(){
			div.innerHTML = "";
			div.classList.remove("alert");					
			div.classList.remove("alert-success");
		},5000);
	}else if(val === 'fail'){
		div.classList.add("alert");
		div.classList.add("alert-success");
		div.innerHTML = "Error";
		setTimeout(function(){
			div.innerHTML = "";
			div.classList.remove("alert");					
			div.classList.remove("alert-success");
		},5000);
	}	
</script> 