<?php require_once("../../config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<?php require_once("../../includes/head.php"); ?>
	<?php require_once("../js/main.js"); ?>
</head>
<body>
<!-- sdasdasd -->
<div id="LoginForm">
	<div class="container">
		<!-- <h1 class="form-heading">login Form</h1> -->
			<div class="login-form">
				<div class="main-div">
				   <div class="panel">
				   <h2>Login</h2>
				   <p>Please Enter Your Email And Register Number</p>
				   </div>
				    <form id="Login" action="<?php echo DOCROOT.'/classes/login.class.php';?>" method="POST">
				        <div class="form-group">
				            <input type="text" name="email" placeholder="Enter Your Email" class="form-control">
				        </div>
				        <div class="form-group">
				           <input placeholder="Enter your Register Number" type="text" name="regNo" class="form-control" autocomplete="off">
				        </div>
				        <button type="submit" class="btn btn-primary">Login</button>
				    </form>
				</div>
			</div>
	</div>
</div>
</div>

</body>
</html>