<?php 
require_once "database.class.php";
class Attendence{
public $regNum;
public $Result;
public $DB;
public $recorded_date;
// return attendence records
// insert attendence records
function __construct(PDO $pdo){
	$this->DB = $pdo;
}
public function getMonth($month,$year){
	$dt    = DateTime::createFromFormat('!m', $month);
	$month = $dt->format('F');
	$stmt  = $this->DB->prepare(" SELECT *FROM attendence WHERE MONTHNAME(recorded_date) = ? AND YEAR(recorded_date) = ? ");
	$stmt->execute([$month,$year]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function set($regNum,$result){
	$this->regNum = $regNum;
	$this->Result = $result;
	$dt = new DateTime();
	$this->recorded_date = $dt->format('Y-m-d');
}
public function checkIfRecordedToday($reg){
	$date = date('Y-m-d');
	$stmt = $this->DB->prepare("SELECT *FROM attendence WHERE user_id = ? AND recorded_date = ?");
	$stmt->execute([$reg,$date]);
	return $stmt->rowCount();
}
public function insert(){
	try{
		$data = [
				 $this->regNum,
				 $this->Result,
				 $this->recorded_date
				];
		$stmt = $this->DB->prepare("INSERT INTO attendence(user_id,attendence,recorded_date) 
			VALUES(?,?,?)");
		$stmt->execute($data);
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}
public function get(){
	return [
		$this->regNum,
		$this->recorded_date,
		$this->Result,
	];
}
public function getPreviousMonthRecords($reg){
	$dateOb  = new dateTime('last month');
	$month   = $dateOb->format('F');
	$stmt    = $this->DB->prepare("SELECT *FROM attendence WHERE user_id = ? AND MONTHNAME(recorded_date) = ?");
	$stmt->execute([$reg,$month]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getAllJson($dt){
	try{
		$query = "SELECT *FROM attendence WHERE recorded_date=?";
		$stmt  = $this->DB->prepare($query);
		$res   = $stmt->execute([$dt]);
		if($res){
			$id     = array();
			$uid    = array();
			$rec    = array();
			$result = array();
			
			while ( $res = $stmt->fetch(PDO::FETCH_ASSOC) ){
				array_push($id, $res['id']);
				array_push($uid, $res['user_id']);
				array_push($result, $res['attendence']);
				array_push($rec, $res['recorded_date']);
			}
			$combi = 
			[
				"id"      => $id,
				"user_id" => $uid,
				"recorded_date" => $rec,
				"attendence" => $rec,
				"result" => $result,
			];
			$combiJSON = json_encode($combi); 
			return $combiJSON;

		}else{
			echo "errr with executing query";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

}
//
$db = new Database(HOST,USER,PASSWORD,'hostel');
$ob = new Attendence($db->make());
if (
	isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
	$_SERVER['HTTP_X_REQUESTED_WITH'] === "presentBtn" 
	&& $_POST['pressed'] == "present") {
	
	// put in ATTENDENCE table the attendence 
		$ob->set($_POST['user_reg'],'present');
		if ( $ob->checkIfRecordedToday($_POST['user_reg']) ){
			echo 'Already_Recorded';
		}else{
			echo $ob->insert();
		}

}elseif (
		isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
		$_SERVER['HTTP_X_REQUESTED_WITH'] === "absentBtn"
		&& $_POST['pressed']=="absent") {
			$ob->set($_POST['user_reg'],'absent');
			//check if already record is in table for the incoming regInp
			if ( $ob->checkIfRecordedToday($_POST['user_reg']) ){
				echo 'Already_Recorded';
			}else{
				echo $ob->insert();
			}
	// var_dump($res);	
}elseif (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&  
		$_SERVER['HTTP_X_REQUESTED_WITH'] === "viewRecords"){
	// var_dump($_POST);
			echo( $ob->getAllJson($_POST['date']) );
}elseif 
	( 
	isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] === 'filterMonth' &&
	isset($_POST['month']) && 
	isset($_POST['year']) 
	) {
	
		$res = $ob->getMonth( $_POST['month'] , $_POST['year'] );
		echo json_encode($res);
}