<?php 
session_start();
require_once("database.class.php");
class Login{
	public $userEmail;
	public $userReg;
	public $DB;
	public $uData;

	function __construct(Database $ob){
		$this->DB = $ob;
	}

	public function set($email,$reg){
		$this->userEmail = $email;
		$this->userReg   = $reg;
	}
	public function verify(){
		// return true if login success else return false
		// connect to db
		// fetch row where entered uname and pass exist in table
			// compare fetched and entered values
			// if match return true
			// else return false
		$ob    = $this->DB->make();
		$query = "SELECT *FROM members WHERE user_email = ? AND user_reg = ?";
		$stmt  = $ob->prepare($query);
		$stmt->execute([$this->userEmail,$this->userReg]);
		// $this->uData = $stmt->fetchAll();
		// var_dump($this->uData);
		if( $this->uData = $stmt->fetchAll(PDO::FETCH_OBJ) )
			return true;
		else
			return false;
	}
	public function verifyIfAdmin(){
		$ob    = $this->DB->make();
		$query = "SELECT *FROM admin WHERE  email = ? AND id = ?";
		$stmt  = $ob->prepare($query);
		$stmt->execute([$this->userEmail,$this->userReg]);
		if( $this->uData = $stmt->fetchAll(PDO::FETCH_OBJ) )
			return true;
		else
			return false;
	}
	public function makeSession(string $email){
		$_SESSION['logged']  = $email;
		// var_dump($this->uData);
		$_SESSION['name']    = $this->uData;
		if($email === "admin")
			$_SESSION['admin']    = "admin";			
		// var_dump($_SESSION['logged');
	}
	public function controller(Login $ob){
		if ( filter_has_var(INPUT_POST, 'email')	&& filter_has_var( INPUT_POST, 'email') ) {
			$ob->set( $_POST['email'],$_POST['regNo'] );
			//  check if user if user -- "user"
			if( $ob->verify() ){
				$ob->makeSession($_POST['email']);				
				return "user";				
			// check if admin -- "admin"
			}elseif( $ob->verifyIfAdmin() ){
				$ob->makeSession("admin");				
				return "admin";
			}	
			//else -- false 
			else{
				return false;
			}	
		}
	}
}
$ob = new Login(new Database(HOST,USER,PASSWORD,'hostel'));
if(  $ob->controller($ob) === "user" ){
	// $loc = $_SERVER['DOCUMENT_ROOT'].'/assets/templates/user-home.view.php' ;
	 header("Location: ".DOCROOT.'/assets/templates/user/user-home.view.php');
}elseif( $ob->controller($ob) === "admin" ){
	 header("Location: ".DOCROOT.'/assets/templates/manager/manager-home.view.php');
}else
	echo "invalid user";
	













 ?>