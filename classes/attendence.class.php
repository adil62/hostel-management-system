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
public function set($regNum,$result){
	$this->regNum = $regNum;
	$this->Result = $result;
	$dt = new DateTime();
	$this->recorded_date = $dt->format('Y-m-d');
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

}
//

$db = new Database(HOST,USER,PASSWORD,'hostel');
$ck = new Attendence($db->make());
if ($_SERVER['HTTP_X_REQUESTED_WITH'] === "presentBtn" 
		 && $_POST['pressed']=="present") {
	// put in ATTENDENCE table the attendence 
	$ck->set($_POST['user_reg'],'present');
	$res = $ck->insert();
	var_dump($res);    
	

}elseif ($_SERVER['HTTP_X_REQUESTED_WITH'] === "absentBtn"
		&& $_POST['pressed']=="absent") {
	$ck->set($_POST['user_reg'],'absent');
	$res = $ck->insert();
	var_dump($res);	
}