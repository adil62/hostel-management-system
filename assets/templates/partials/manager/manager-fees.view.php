<?php if( isset($_GET['p']) && $_GET['p'] == 'update'): ?>
<div class="section">
<h4 class="font-weight-light text-center">Update Per Day Charge</h4>
<div class="row">
	<div class="col-md-2">
		Current Amount :
	</div>
	<div id="current-fee" class="col-md-4 ">		
		<input type="text" name="" disabled="disabled" id="current-amount">
	</div>
</div>
<div class="row">
	<label for="new-fee" class="col-md-2">Enter The New Amount</label>	
	<div class="col-md-4">
		<input type="text" name="new" id="new-fee">
		<button class="btn btn-outline-success btn-sm" id="update">Update</button>	
	</div>
</div>	
	<div id="msg"></div>	
</div>
<?php endif; ?>
<?php if( isset($_GET['p']) && $_GET['p'] == 'view'): ?>
	<div class="section">
		<h4 class="text-center font-weight-light mb-5">View Previous Payment Records</h4>
		<div class="row">
				<p class="font-weight-bold">Filter By</p>
				<span class="ml-3">Date</span>
			<div class="col-md-4">
				<input type="text" name="" id="date2" data-large-default="true" data-large-mode="true" data-format="Y-m-d">
				<button class="btn btn-warning btn-sm" id="filter1">go</button>
			</div>
				<p>Month</p>
			<div class="col-md-4 ">
				<select id="select">
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
				<select  disabled="disabled">
				<?php require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/classes/utility.class.php'); ?>	
					<option id="currentYear" value="<?= $ob->thisYear(); ?>">
						<?= $ob->thisYear(); ?>
					</option>
				</select>
				<button class="btn btn-warning btn-sm" id="filter2">go</button>
			</div>
		</div>
		<div class="row" id="content"></div>
	</div>
<?php endif; ?>
<?php if( isset($_GET['p']) && $_GET['p'] == 'pay'): ?>
<div class="section">
	<input type="text" name="" placeholder="Enter Register Number Of User" id="reg_input" size="30">
	<button class="btn btn-outline-primary btn-sm" id="pay-reg">Go</button>
	<div id="payDetails" class="none">
		<div class="reg">
			<span>Register Number</span>
			<span></span>
		</div>
		<div class="present">
			<span>Present Days</span>
			<span></span>
		</div>
		<div class="amount">
			<span>Calculated Fee</span>			
			<span></span>
		</div>
	</div>
	<button class="btn btn-outline-danger  btn-sm none" id="submitPay">Submit</button>
	<div class="row">
		<div class="col-md-4 offset-md-4" id="payResult">
		</div>
	</div>
</div>
<?php endif; ?>
<!-- if FINE -->
<?php if( isset($_GET['p']) && $_GET['p'] == 'fine'): ?>
<div class="section">
	<label class="mr-3">Filter</label>
	<select id="month">
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
	<select id="year">
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
	<button class="btn btn-outline-success btn-sm" id="filterMonth"> Go </button>
	<div id="divTable"></div>
</div>
<script type="text/javascript" src="<?php echo DOCROOT.'/assets/js/manager-fine.js';?>"></script>	
<?php endif; ?>