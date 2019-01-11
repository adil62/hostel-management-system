<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/database.class.php");
class Utility{
	public function thisYear(){
		$date = new DateTime();
		$date = $date->format('Y');
		return($date);
	}
	public function previousYear($thisYear,$prev){
		$result = [];
		$year   = $thisYear;
		for ($i=1; $i <= $prev ; $i++) { 
			$year = $year - 1;
			array_push($result, $year);
		}
		return $result;
		
	}
	public function yearRange($start,$end){
		$yearArray = range(2000, 2050);
		var_dump($yearArray);
		?>
		<!-- displaying the dropdown list -->
		<select name="year">
		    <option value="">Select Year</option>
		    <?php
		    foreach ($yearArray as $year) {
		        // if you want to select a particular year
		        $selected = ($year == 2015) ? 'selected' : '';
		        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
		    }
		    ?>
		</select><?php 
	}
}

$ob = new Utility();



 ?>