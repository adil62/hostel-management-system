<?php if( isset($_GET['p']) && $_GET['p'] === 'old' ): ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/manager-complaint.class.php" ); ?>
<div class="section">
	<h3 class="text-center font-weight-light mb-3"> Previously Posted Complaints </h3>
	<?php  	echo $ob->getParticularComplaint($_SESSION['name'][0]->user_reg);	 ?>	
</div>

<?php else: ?>
<div class="section">
<h3 class="text-center font-weight-light"> Complaint </h3>
<form action="http://localhost/projects/hostel/classes/manager-complaint.class.php" method="POST" class="form-group">
	<div class="row">
		<input type="text" name="title" placeholder="Enter Subject" class="col-md-6 offset-md-3 form-control" id="title" required="required">
	</div>
	<div class="row">
		<input type="text" name="message" placeholder="Enter Message" class="col-md-6 offset-md-3 form-control" id="message">		
	</div>	
	<div class="row">
		<input type="submit" name="submit" value="Submit" class="col-md-6 offset-md-3 form-control btn btn-success" id="submit">		
	</div>
	<input type="hidden" name="reg" value="<?= $_SESSION['name'][0]->user_reg;?> ">
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
	}
</script>
<?php endif; ?> 