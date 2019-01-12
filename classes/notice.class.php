<?php 
require_once( $_SERVER['DOCUMENT_ROOT'].'/projects/hostel/classes/database.class.php' );
class Notice{
public $DB ;

	function __construct(PDO $pdo){
		$this->DB = $pdo;
	}
	public function addNotice($reg,$msg){
		$date = date('Y-m-d');
		if( $reg == "" ){
			$reg = 1;	
		}
		$stmt = $this->DB->prepare("INSERT INTO notice(reg,message,date) VALUES(?,?,?)");
		$stmt->execute([$reg,$msg,$date]);
		return $stmt->rowCount();
	}
	public function getNoticeAll(){
		$stmt = $this->DB->prepare("SELECT *FROM notice ORDER BY id DESC ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getNotice($reg){
		$stmt = $this->DB->prepare("SELECT *FROM notice WHERE reg = ? ");
		$stmt->execute([$reg]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function deleteNotice($id){
		$stmt = $this->DB->prepare("DELETE FROM notice WHERE id = ? ");
		$stmt->execute([$id]);
		return $stmt->rowCount();
	}
	public function getBcast(){
		$stmt = $this->DB->prepare("SELECT *FROM notice WHERE reg = 1");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}
$db = new Database(HOST,USER,PASSWORD,'hostel');
$ob = new Notice($db->make());

if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'getData' ){
	
}elseif( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'putData' ){
	$reg = $_POST['reg'];
	$msg = $_POST['msg'];
	echo $_POST['reg'];
	echo $ob->addNotice($reg,$msg);
}elseif( isset($_GET['dltId']) ){
	$res = $ob->deleteNotice( $_GET['dltId'] );
	if($res){
		$loc =  $_SERVER['HTTP_REFERER'];
		header("Location: $loc");
	}
		//redirect to where to came from
}








?>