<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/manager/head.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/includes/head.php"); ?>
	<title>Manager</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/manager/manager-nav.view.php"); ?>
 <div class="wrapper">
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/manager/manager-sidebar.view.php");?>
	<section>
	<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/manager/manager-attendence.view.php"); ?>
    </section>
</div>
</body>
</html>