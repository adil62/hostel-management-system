<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projects/hostel/includes/database.php");//db configuration
class Database{
	protected $host;
	protected $user;
	protected $password;
	protected $db;
	protected $pdo;
	function __construct($host,$user,$password,$db=NULL){
		$this->host 	= $host;
		$this->user 	= $user;
		$this->password = $password;
		$this->db 		= $db;
	}

	public function make(){
		try{
			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->password);
			$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}	
		return $this->pdo; //Return PDO instance
	}
	public function prepare(PDO $pdo){
		// Return PDOstatement
		$stmt = NULL;
		$query = "INSERT INTO members(
					user_name,user_branch,user_year,user_reg,user_email,user_phone,user_address, 	user_parent_phone,user_gender,user_room 
				  )
				  VALUES(?,?,?,?,?,?,?,?,?,?)";
		$stmt  = $pdo->prepare($query);
		return $stmt;
	}
	public function get(){
	}
}

