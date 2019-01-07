<?php 
require_once('database.class.php');
class Checker{
	public $regNum;
	public $DB;
	function __construct(PDO $pdo){
		$this->DB = $pdo; 
	}
	public function regExists($val){
		try{
			$stmt = $this->DB->prepare("SELECT * FROM members WHERE user_reg = ?");
			$res  = $stmt->execute([$val]);
			if( $stmt->fetch() )
				return true;
			else
				return false;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
}
$db  	= new Database(HOST,USER,PASSWORD,'hostel');
if( $_SERVER['HTTP_X_REQUESTED_WITH'] === "userExists" ){
	$regNum = $_POST['user_reg'];
	// var_dump($_POST);
	$ck  	= new Checker($db->make());
	$res 	= $ck->regExists($regNum);
	echo $res;
}
?>