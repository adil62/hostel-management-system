<?php if(isset($_GET['p']) && $_GET['p'] == "view"): ?>
<div class="container">
	<h3 class="text-center font-weight-light">View Complaints</h3>
<div id="section" class="mt-3">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/manager-complaint.class.php"); ?>
	<?php echo $ob->getComplaint(); ?>
</div>
</div>
<?php elseif(isset($_GET['p']) && $_GET['p'] == "dlt"): ?>

<div class="container">
	<h3 class="text-center font-weight-light mb-5">Delete Complaints</h3>
		<input type="text" name="id" class="form-control col-md-4 offset-md-4" id="input" placeholder="Enter The Id Of The Complaint">
		<input type="submit" name="submitDlt" class="form-control col-md-2 offset-md-5 btn btn-outline-danger mt-2" value="Delete" id="ev">
	<div id="msg" class="mt-2 ">
	</div>
</div>
<?php endif; ?>

<script type="text/javascript" src="<?= JS.'/manager-complaintAJAX.js';?>"></script>
<script type="text/javascript" src="<?= DOCROOT.'/vendor/js/jquery.js';?>"></script>
<script type="text/javascript" src="<?= DOCROOT.'/vendor/js/bootstrap.js';?>"></script>
