<?php

 		$loc  = "http://localhost/projects/hostel/assets/templates/user/user-complaint.view.php";
		$res  = preg_match("/\?msg=suc/", $loc);		
		if($res){
			echo "has msg=suc";
		}else{
			$new = preg_replace('/$/', 'holaaaaa', $loc);
			echo $new;
		}


 ?>