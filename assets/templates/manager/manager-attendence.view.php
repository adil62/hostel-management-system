<?php session_start(); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/assets/templates/partials/manager/head.php");?>
<link rel="stylesheet" type="text/css" href="http://localhost/projects/hostel/vendor/css/datedropper.css">
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
<script type="text/javascript" src="<?php echo DOCROOT.'/vendor/js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo DOCROOT.'/vendor/js/datedropper.js'; ?>"></script>
<script>
	$('#date').dateDropper();
</script>
</body>
</html>