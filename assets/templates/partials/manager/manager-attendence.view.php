<?php if(isset($_GET['p'])): ?>
	<?php if ( $_GET['p'] == 'add' ): ?>
	<h3 class="text-center font-weight-light mb-3">
		Record Todays Attendence <span><?php echo '('.date('Y-m-d').')'; ?></span>
	</h3>
	<div class="container ">
		<input type="text" name="reg_no" placeholder="Enter The Register Number" id="ajax3">
		<span id="check"></span>
	</div>
	<div id="Attendence">

		<button id="present" class="btn btn-success">Present</button>
		<button id="absent" class="btn btn-danger">Absent</button>
		<div id="success"></div>
	</div>
	<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/manager-attendence.js'; ?>"></script>
	<?php elseif( $_GET['p'] == 'view'): ?>
		<h3 class="text-center">View Records</h3>
		<input type="text" name="" id="date" data-large-default="true" data-large-mode="true" >
		<button class="btn btn-primary btn-sm" id="view">View</button>
	<?php endif; ?>
<?php endif; ?>
