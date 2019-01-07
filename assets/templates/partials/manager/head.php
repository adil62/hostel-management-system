<?php require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php"); ?>
<?php 
	if( !isset($_SESSION['admin']) ){
		$loc = DOCROOT.'/Unauthorized.php';
		header("Location: $loc");exit();
    }
 ?>