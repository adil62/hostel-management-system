<?php if(isset($_GET['p'])): ?>
	<?php if ( $_GET['p'] == 'add' ): ?>
	<h3 class="text-center font-weight-light mb-3">
		Record Todays Attendence <span><?php echo '('.date('Y-m-d').')'; ?></span>
	</h3>
	<div class="container form-group">
		<div class="row mt-5">
			<p class="col-md-4">Enter Members Register Number</p>
			<!-- <label for="ajax3">Enter Members Register Number -->
			<input type="text" name="reg_no" placeholder="Type Here.." id="ajax3" class="form-control col-md-6">
			<span id="check"></span> 
		</div>	
	</div>
	<div id="Attendence">
		<button id="present" class="btn btn-success">Present</button>
		<button id="absent" class="btn btn-danger">Absent</button>
		<div id="success"></div>
	</div>
	<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/manager-attendence.js'; ?>"></script>
	<?php elseif( $_GET['p'] == 'view'): ?>
		<h3 class="text-center mb-5">View Records</h3>
		<div class="row">
			<input type="text" name="" id="date" data-large-default="true" data-large-mode="true" data-format="Y-m-d" class="col-md-4">
			<button class="btn btn-primary btn-sm" id="view">View</button>
			<i class="m-2"></i>
			<select id="month" class="col-md-2">
				<option value="0">Month</option>
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select id="year" class="col-md-2">
				<option>YEAR</option>
				<?php require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/classes/utility.class.php'); ?>
				<?php $thisYear = $ob->thisYear(); ?>
				<?php $prev     = $ob->previousYear($thisYear,3);  ?>
 				<option selected="selected"> <?= $thisYear;  ?> </option>
				<?php  	foreach ($prev as $key => $value): ?>
			 			<option value="<?= $prev[$key]; ?>" >
			 			 	<?= $prev[$key]; ?> 
			 			</option>  
				<?php   endforeach;?>
			</select>
			<button type="button" class="btn btn-primary btn-sm" id="monthFilter">GO</button>	
		</div>
		<div id="DIVtable"></div>

		<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/manager-displayRecords.js'; ?>"></script>
	<?php endif; ?>
<?php else: ?>
		<h1 class="text-center font-weight-light">Attendence</h1>
<?php endif; ?>

