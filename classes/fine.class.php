<?php 
require_once "database.class.php";
class Fine{
public $DB;	
function __construct(PDO $pdo){
	$this->DB = $pdo;
}

public function getAll(){
	$stmt = $this->DB->prepare("SELECT *FROM fee ORDER BY id DESC");
	$stmt->execute();	
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return json_encode($row);
}

public function getMonth($month){
	$ob   		  = DateTime::createFromFormat('m', $month);
	$month_string = $ob->format('F');
	$stmt 		  = $this->DB->prepare("SELECT *FROM fee WHERE MONTHNAME(date) = ?");
	$stmt->execute([$month_string]);	
	$row  		  = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return json_encode($row);
}

public function getMember(){
	$stmt = $this->DB->prepare("SELECT user_reg FROM members");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC); //member regnum array
}
public function putInDb($data){
	$stmt = $this->DB->prepare("SELECT *FROM fee WHERE stud_id = :reg AND amount = :fine AND date = :date");
	$stmt->execute($data);
	if($stmt->rowCount()){
		return 0;
	}else{
		$stmt = $this->DB->prepare("INSERT INTO fee(stud_id,amount,date) VALUES(:reg,:fine,:date)");
		$stmt->execute($data);
		return $stmt->rowCount();	
	}
}

public function payFine($info){
	//need Fine value AND date
	$stmt = $this->DB->prepare("DELETE FROM fees WHERE amount = :amount AND date = :date");
	$stmt->execute();
	return $stmt->rowCount();
}

public function calculateFine(){
$all_mem      = $this->getMember();
	$fine_per_day = 10; 
	// print_r($all_mem);
	foreach ($all_mem as $key => $value) {
		//check each user last payment date 
			//compare todays date with lastPAYment date if differnece > 30 FINEEE1!
			$stmt  = $this->DB->prepare("SELECT *FROM payment WHERE user_reg = ? ORDER BY id DESC LIMIT 1");
			$reg   = $value['user_reg'];
			$stmt->execute([$reg]); 
			$row   = $stmt->fetch(PDO::FETCH_ASSOC);
			// var_dump($row);
			$last_payment = $row['payment_date'];
			$last_payment = new DateTime($last_payment);
			// var_dump($last_payment);echo "<br>";
			$todays       = new DateTime();
			// var_dump($todays);echo "<br>";
			$diff         = $todays->diff($last_payment);
			$diff_days    = $diff->days;
			// echo "diff:$diff_days";
			if ( $diff_days > 31  ) {
				//pay due
				$how_many = $diff_days - 30;
				$fine     = $how_many * $fine_per_day;
				$data     = 
							[
								'reg' => $reg,
								'fine' => $fine,
								'date' => $todays->format('Y-m-d'),
							];
				if($this->putInDb($data))
					return 1;
				else
					return 0;
				// echo $reg.'<br>'.$fine;
			}else{
				continue;
			}

	}
}

}

$db = new Database(HOST,USER,PASSWORD,'hostel');
$ob = new Fine($db->make());
$res = $ob->calculateFine();
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
 	$_SERVER['HTTP_X_REQUESTED_WITH'] === 'getData' ){
	
	echo $ob->getAll();
}elseif( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
 	$_SERVER['HTTP_X_REQUESTED_WITH'] === 'getMonth' ){
	
	$month = $_POST['month']; 
	echo $ob->getMonth($month);
}                


// echo $ob->getAll();


 ?>