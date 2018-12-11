<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/head.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/includes/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="../../vendor/css/datedropper.css">
	<title>User</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/user-nav.view.php"); ?>
<!-- <div class="container-fluid" style="border: 2px solid black;"> -->
<div class="wrapper">
	<?php require_once ($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/user-sidebar.view.php");?>
		<section>
		<!--  include user ATTENDENCE Partials -->
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/user-library.view.php"); ?>
		</section>
</div>
	<script type="text/javascript" src="../../vendor/js/jquery.js"></script>
	<script type="text/javascript" src="../../vendor/js/datedropper.js"></script>
	<script type="text/javascript">
		$("#date").dateDropper();
	</script>
</body>
</html>