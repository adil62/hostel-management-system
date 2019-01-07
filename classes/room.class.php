<?php 
require_once "database.class.php";
class Room{
	function __construct(PDO $pdo){
		$this->DB = $pdo;
	}
	public function getDetails(){
		$stmt = $this->DB->prepare("SELECT user_room FROM members");
		$stmt->execute();
		$row  = $stmt->fetchAll(PDO::FETCH_OBJ);
		$row  = json_encode($row);
		return $row;
	}
	public function getRoomMembers($room){
		$stmt = $this->DB->prepare("SELECT *FROM members WHERE user_room = ?");
		$stmt->execute([$room]);
		$row  = $stmt->fetchAll(PDO::FETCH_OBJ);
		$row  = json_encode($row);
		return $row;
	}
}
$db = new Database(HOST,USER,PASSWORD,'hostel');
$ob = new Room( $db->make() );

if(isset($_GET['viewRoom'])){
	echo $ob->getRoomMembers($_GET['viewRoom']);

}else{
	echo $ob->getDetails() ;
}

 ?>