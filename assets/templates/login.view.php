<?php require_once("../../config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<?php require_once("../../includes/head.php"); ?>
	<?php require_once("../js/main.js"); ?>
</head>
<body>
<div class="container vertical-align">
	<div class="row">
		<div class="col-md-12"> 
			<h3 class="text-center">Login</h3>
		</div>
	</div> 
	<form method="POST" class="form-group" action=" <?php echo DOCROOT.'/classes/login.class.php';  ?> ">
		<div class="row">
			<div class="col-md-6 offset-md-3 offset-md-3">
				<input type="text" name="email" placeholder="Enter Your Email" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<input placeholder="Enter your Register Number" type="text" name="regNo" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<input  type="submit" name="submit" class="form-control btn btn-primary" value="Login">
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-md-4 offset-md-8">
			<a href="<?= TEMPLATES.'/register.view.php'; ?>">Register</a>
		</div>
	</div>			
</div>
</body>
</html>