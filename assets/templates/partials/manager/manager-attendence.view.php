<?php if(isset($_GET['p'])): ?>
	<?php if ( $_GET['p'] == 'add' ): ?>
	<h3 class="text-center font-weight-light mb-3">
		Record Todays Attendence <span><?php echo '('.date('Y-m-d').')'; ?></span>
	</h3>
	<div class="container form-group">
		<label for="ajax3">Enter Members Register Number
		<input type="text" name="reg_no" placeholder="Type Here.." id="ajax3" class="form-control">
		</label>
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
		<input type="text" name="" id="date" data-large-default="true" data-large-mode="true" data-format="Y-m-d">
		<button class="btn btn-primary btn-sm" id="view">View</button>
		<div id="DIVtable"></div>

		<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/manager-displayRecords.js'; ?>"></script>
	<?php endif; ?>
<?php else: ?>
		<h1 class="text-center font-weight-light">Attendence</h1>
<?php endif; ?>

