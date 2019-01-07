<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/classes/database.class.php");
class Fee{
	public $DB;
	public function getLatestFee(){
		$stmt = $this->DB->prepare("SELECT fee FROM config");
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		$res = json_encode($res);
		return $res;
	}
	public function updateFee($value){
		$stmt = $this->DB->prepare("UPDATE config SET fee=?");
		$stmt->execute([$value]);
		return $stmt->rowcount();

	}
	public function getParticularDate($date){
		$stmt = $this->DB->prepare("SELECT *FROM payment WHERE payment_date = ?");
		$stmt->execute([$date]);
		$res  = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$res  = json_encode($res);
		return $res;
	}
	public function getAllMonth($month){
		// echo $month;
		$dateObj          = DateTime::createFromFormat('m', $month);
		$last_monthString = $dateObj->format('F');
		$stmt = $this->DB->prepare("SELECT *FROM payment WHERE MONTHNAME(payment_date) = ?");
		$stmt->execute([$last_monthString]);
		$res  = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$res  = json_encode($res);
		return $res;
	}

public function getParticularUser($reg){
		$dateOb  = new dateTime('last month');
		$month   = $dateOb->format('F');
	    $stmt    = $this->DB->prepare("SELECT *FROM fee WHERE MONTHNAME(date) = ?");
		$stmt->execute([$month]);
		$res     = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function genFeesUser($reg){
	$stmt   = $this->DB->prepare("SELECT *FROM payment WHERE user_reg = ? ORDER BY id DESC LIMIT 1");
	$stmt->execute( [$reg] );
 	$row    = $stmt->fetch(PDO::FETCH_ASSOC);
 	$lastDT = $row['payment_date'];
 		$lastDT = new DateTime($lastDT);		
 	$today  = new DateTime();
 			$today->format('F');
 	$diff   = $today->diff($lastDT);
 	$diff   = $diff->days;
 	$stmt   = $this->DB->prepare("SELECT fee FROM config");
	$stmt->execute();
 	$row    = $stmt->fetch(PDO::FETCH_ASSOC);
 		if( $diff > 31 ){
 			$res    = "Fee Is Due";
 			$fine   = ($diff - 31) * 10;
 			$amount = $row['fee'];
 			$fees   = ($amount * 31 ) + $fine;
 			return $fees;
 		}	

}
	function __construct(PDO $pdo){
		$this->DB = $pdo;
	}
}
$db  = new Database(HOST,USER,PASSWORD,'hostel');
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == "getLatest"){

	$fee = new Fee($db->make());
	echo $fee->getLatestFee();

}
elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == "updateValue"){
	
	$fee = new Fee($db->make());
	echo $fee->updateFee($_POST['value']);

}elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == "getDate"){
	
	$fee = new Fee($db->make());
	echo( $fee->getParticularDate($_POST['date']));
	// echo( $fee->getParticularDate("2018-12-14"));

}elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == "getMonth"){
	
	$fee = new Fee($db->make());
	echo( $fee->getAllMonth($_POST['month']));

}








 ?>