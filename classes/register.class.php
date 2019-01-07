<?php 
require_once("database.class.php");
require_once("display.class.php");
require_once('../config.php');
require_once('../includes/database.php');//db configuration
class Register{
	protected $userName;
	protected $userBranch;
	protected $userYear;
	protected $userReg;
	protected $userEmail;
	protected $userPhone;
	protected $userAddress;
	protected $userParentPhone;
	protected $userGender;
	protected $userRoom;
	protected $data;
	protected $stmt;
	public function get(){
			echo  $this->userName."<br>";
			echo  $this->userBranch."<br>";
			echo  $this->userYear."<br>";
			echo  $this->userPassword."<br>";
			echo  $this->userEmail."<br>";
			echo  $this->userPhone."<br>";
			echo  $this->userAddress."<br>";
	}
	public function set($var,$val){
		$this->userName    	   =  $var === 'userName'       ? $val : $this->userName;
		$this->userBranch      =  $var === 'userBranch'     ? $val : $this->userBranch;
		$this->userYear        =  $var === 'userYear'       ? $val : $this->userYear;
		$this->userReg         =  $var === 'userReg'        ? $val : $this->userReg;
		$this->userEmail       =  $var === 'userEmail'      ? $val : $this->userEmail;
		$this->userPhone       =  $var === 'userPhone'      ? $val : $this->userPhone;
		$this->userAddress     =  $var === 'userAddress'    ? $val : $this->userAddress;
		$this->userParentPhone =  $var === 'userParentPhone'? $val : $this->userParentPhone;
		$this->userGender      =  $var === 'userGender'     ? $val : $this->userGender;
		$this->userRoom        =  $var === 'userRoom'       ? $val : $this->userRoom;
	}
	public function insert(){
		$this->data = [
			$this->userName,
			$this->userBranch,
			$this->userYear,
			$this->userReg,
			$this->userEmail,
			$this->userPhone,
			$this->userAddress,
			$this->userParentPhone,
			$this->userGender,
			$this->userRoom
		];
		// print_r($this->data);
		return $this->stmt->execute($this->data);
	}
	function __construct(Database $db){
		$this->stmt = $db->prepare($db->make());
	}
}
$db   = new Database(HOST,USER,PASSWORD,'hostel');
$reg  = new Register($db);
$reg->set('userName',$_POST['user-name']);
$reg->set('userBranch',$_POST['user-branch']);
$reg->set('userYear',$_POST['user-year']);
$reg->set('userReg',$_POST['user-regno']);
$reg->set('userEmail',$_POST['user-email']);
$reg->set('userPhone',$_POST['user-phone']);
$reg->set('userAddress',$_POST['user-address']);
$reg->set('userParentPhone',$_POST['user-parentphone']);
$reg->set('userGender',$_POST['user-gender']);
$reg->set('userRoom',$_POST['user-roomnum']);

if( $reg->insert() ){
	$disp = new Display();
	$disp->show("Submitted Press ok To continue");
	$loc = DOCROOT.'/assets/templates/manager/manager-home.view.php';
	header("Location: $loc");
}
