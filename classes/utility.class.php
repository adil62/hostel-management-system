<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/database.class.php");
class Utility{
	public function thisYear(){
		$date = new DateTime();
		$date = $date->format('Y');
		return($date);
	}
}

$ob = new Utility();



 ?>