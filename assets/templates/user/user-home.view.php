<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/head.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/includes/head.php"); ?>
	<title>User</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/user-nav.view.php"); ?>
<div class="wrapper">
	<?php require_once ($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/user-sidebar.view.php");?>
		<section>
		<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/user/user-home.view.php"); ?>
		</section>
</div>
</body>
</html>