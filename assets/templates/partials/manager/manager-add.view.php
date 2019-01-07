<!-- <div class="wrapper">
<section > -->
<div class="container">	
<!-- <div class="form"> -->
<form method="POST" class="form-group" action="<?= DOCROOT.'/classes/register.class.php' ?>">
	<!-- COLLECT USER INFO -->
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="text" name="user-name" required="required" placeholder="Enter Members Name" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="nameError">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="text"  name="user-branch" 	 required="required" placeholder="Enter Members Branch" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="branchError">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="number"  	name="user-year" 	 required="required" placeholder="Enter The Year Of Study" max="3" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="yearError">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="text"  name="user-regno" required="required" placeholder="Enter The Register Number" id="reg" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="passwordError"></div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="email" name="user-email"  required="required" placeholder="Enter Members Email" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="emailError">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="number" name="user-phone"  required="required" placeholder="Enter Members Phone Number" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="phoneError">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<textarea name="user-address" required="required" placeholder="Enter Members Address" class="form-control m-2"></textarea>
		</div>
		<div class="col-md-2 reg-Error" id="addressError">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="digit"  name="user-parentphone" required="required" placeholder="Enter Members Parent Phone Number" id="" class="form-control m-2">
		</div>
		<div class="col-md-2 reg-Error" id="passwordError"></div>
	</div>	

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<select name="user-gender" class="form-control m-2">
				<option value="female"> Female   </option>
				<option value="male">  Male     </option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="text" name="user-roomnum" class="form-control m-2" placeholder="Assign Member A Room">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<input type="submit" name="submit" class="form-control btn-cus" id="submit">
		</div>
	</div>	
</form>
<!-- </div> -->
</div>	
<!-- 	</section>
</div> -->

<script type="text/javascript" src="<?php echo DOCROOT;?>/assets/js/cleaner.js"></script>
