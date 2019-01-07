<?php 
require_once("database.class.php");
class Payment{
public $DB;

public function getPreviousRecords($reg){
	$stmt       = $this->DB->prepare("SELECT * FROM payment WHERE user_reg = ? ORDER BY id DESC");
	$stmt->execute([$reg]);
	$row        = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

public function getDetails($reg){
//we have register number need to return number of present days on last month,
	// total fee then call another function to record that last month fee is payed (payment)
$this_month = date('Y-m-d');
$this_month = explode("-",$this_month);
$this_month = $this_month[1];
$last_month = $this_month - 1 ;
$count = 0;
$dateObj          = DateTime::createFromFormat('m', $last_month);
$last_monthString = $dateObj->format('F'); //a full textual reprsntn of a month = F

$stmt       = $this->DB->prepare("SELECT * FROM attendence WHERE MONTHNAME(recorded_date) = ? AND user_id = ?");
$stmt->execute([$last_monthString,$reg]);
$row        = $stmt->fetchAll(PDO::FETCH_ASSOC);
// get number of present days;
for ($i = 0 ; $i < sizeof( $row ) ;$i++) {
		$last_recorded_attendence = $row[0]['recorded_date'];
		if($row[$i]['attendence'] === 'present'){
			$count++;
		}else{
			continue;
		}
	}
// $amount  = 50; //50rs per day	
$stmt    = $this->DB->prepare("SELECT * FROM config");
$stmt->execute();
$amount  = $stmt->fetch(PDO::FETCH_ASSOC);
$amount  = $amount['fee'];
$present = $count ;
$fee     = $amount * $present;

$stmt       = $this->DB->prepare("SELECT * FROM fee WHERE MONTHNAME(date) = ? AND stud_id = ?");
$stmt->execute([$last_monthString,$reg]);
$row        = $stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount()){
	$fine = $row['amount'];
	$fee  = (int)$fee + (int)$fine;
}else{
	$fine = 0;
	$fee  = (int)$fee + (int)$fine ;
}
return [
			"reg"     => $reg,
			"present" => $present,
			"fee" => $fee
		];	
		//return regnumber , present days in last month, calc fee
}

public function putInTable($reg){
	$res     = $this->getDetails($reg);
	$reg     = $res['reg'];
	$present = $res['present'];
	$amount  = $res['fee'];
	$date    = date("Y-m-d");
	//id 	user_reg payment_date 	payment_amount 
	$stmt = $this->DB->prepare("SELECT *FROM payment WHERE  user_reg = ? AND payment_date =? AND payment_amount =? AND present_days = ?");
	$stmt->execute([$reg,$date,$amount,$present]);
	if($stmt->rowCount()){
		while( $row = $stmt->fetch() ){
			$date   = $row['payment_date'];
			$date   = explode('-',$date);
			$month  = $date[1];
			$year   = $date[0];
			$today  = date('Y-m-d');
			$today  = explode("-", $today);
			$today_year   = $today[0];
			$today_month  = $today[1];
			if( $today_month == $month && $today_year == $year){
				// echo "already payed for".$month.'-'.$year;
				return "already-payed";
			}
		}
	}	
	elseif(!empty($res) && !empty($reg) && !empty($present) && !empty($present) && !empty($amount) && !empty($date) ){
		$stmt = $this->DB->prepare("INSERT INTO payment(user_reg,payment_date,payment_amount,present_days)
		 VALUES(?,?,?,?)");
		$stmt->execute([$reg,$date,$amount,$present]);
		return "done";
	}	
}

function __construct(PDO $pdo){
	$this->DB = $pdo;
}

}

$db  = new Database(HOST,USER,PASSWORD,'hostel');
$ob  = new Payment($db->make());
// $reg = "15150441";
// $res = $ob->putInTable($reg);
// if($res == "already-payed"){
// 	echo "payed";
// }elseif($res == "done"){
// 	echo "done";
// }
if( isset($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
	$_SERVER["HTTP_X_REQUESTED_WITH"] == 'getPayData' ){
		
		$reg = $_POST['reg'];
		$res = $ob->getDetails($reg);
		echo json_encode($res);

}elseif (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
	$_SERVER["HTTP_X_REQUESTED_WITH"] == 'putData') {
		
		$reg = $_POST['reg'];
		$res = $ob->putInTable($reg);
		// var_dump($res);
		if($res == "already-payed"){
			echo "payed";
		}elseif($res == "done"){
			echo "done";
		}

}elseif (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
	$_SERVER["HTTP_X_REQUESTED_WITH"] == 'getMemberRecords') {
		
		$reg = $_POST['member_records'];
		$res = $ob->putInTable($reg);
		// var_dump($res);
		if($res == "already-payed"){
			echo "payed";
		}elseif($res == "done"){
			echo "done";
		}

}












 ?>