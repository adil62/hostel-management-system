<?php 
session_start();
require_once("database.class.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/config.php');
class DeleteMember{
	public $userName;
	public $userReg;
	public $DB;
	function __construct(Database $obj){
		$this->DB = $obj; 
	}
	public function set($name,$reg){
		$this->userName = $name;
		$this->userReg  = $reg;
		return $this;
	}
	public function make(){
		$pdo  = $this->DB->make();
		$query = "DELETE FROM members WHERE user_name = ? AND user_reg = ?";
		return $pdo->prepare($query);
	}
	public function execute(){
		$stmt = $this->make();
		$un = $this->userName;
		$up = $this->userReg;
		if(  $stmt->execute([$un,$up]) ){
			return true;			
		}else
			return false;
	}
}
if( isset( $_POST['user_name'] ) && isset( $_POST['user_reg'] )  ){
	$ob   = new DeleteMember( new Database(HOST,USER,PASSWORD,'hostel') );
	$ob->set($_POST['user_name'],$_POST['user_reg']);
	if( $ob->execute() ){
		$loc = DOCROOT.'/assets/templates/manager/manager-home.view.php?p=delete&msg=yes';
		header("Location: $loc");
	}else{
		echo "fail".die();
	}
 }
 ?>