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
    public function memberExist($reg){
    	$pdo   = new Database(HOST,USER,PASSWORD,'hostel');
    	$pdo   = $pdo->make();
    	$stmt  = $pdo->prepare("SELECT *FROM members WHERE user_reg = ? ");
    	$stmt->execute( [$reg] );
    	return $stmt->rowCount();
    }

	function __construct(Database $db){
		$this->stmt = $db->prepare($db->make());
	}
}
$db   = new Database(HOST,USER,PASSWORD,'hostel');
$reg  = new Register( $db );

if(isset($_POST['data'])){
	$DATA = json_decode($_POST['data']);
	// var_dump($DATA);
}

if( 
	isset( $DATA->userName   )      &&
	isset( $DATA->userBranch )      &&
	isset( $DATA->userYear   )      &&
	isset( $DATA->userRegno  )      &&
	isset( $DATA->userEmail  )      &&
	isset( $DATA->userPhone  )      &&
	isset( $DATA->userAddress)      &&
	isset( $DATA->userParentPhone ) &&
	isset( $DATA->userGender      ) &&
	isset( $DATA->userRoom   ) 
   	
   )
{
	$reg->set('userName',       $DATA->userName);
	$reg->set('userBranch',     $DATA->userBranch);
	$reg->set('userYear',       $DATA->userYear);
	$reg->set('userReg',        $DATA->userRegno);
	$reg->set('userEmail',      $DATA->userEmail);
	$reg->set('userPhone',      $DATA->userPhone);
	$reg->set('userAddress',    $DATA->userAddress);
	$reg->set('userParentPhone',$DATA->userParentPhone);
	$reg->set('userGender',     $DATA->userGender);
	$reg->set('userRoom',       $DATA->userRoom);      
	
	if( $reg->memberExist( $DATA->userRegno ) ){
		echo "exist";
	}else{
		if( $reg->insert() ){
			echo true;
			// $disp = new Display();
			// $disp->show("Submitted Press ok To continue");
			// $loc = DOCROOT.'/assets/templates/manager/manager-home.view.php?suc=yes';
			// header("Location: $loc");
		}
	}	
}