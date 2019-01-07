<?php 
	if ( !isset( $_SESSION['name']) ) {
		$loc = DOCROOT.'/Unauthorized.php';
		header("Location: $loc");exit();die();
	}
 ?>