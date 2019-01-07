<?php 
require_once("database.class.php");
require_once("pagination.class.php");
class Complaint{
	public $title;
	public $msg;
	public $DB;
	function __construct(PDO $pdo){
		$this->DB = $pdo;
	}
	public function putComplaint($title,$msg,$reg){
		$date = date("Y-m-d");
		$stmt = $this->DB->prepare( "INSERT INTO complaints(title,message,user_reg,date) VALUES(?,?,?,?);" );
		$stmt->execute( [$title,$msg,$reg,$date] );
		return $stmt->rowcount();
	}

	public function getParticularComplaint($reg){
		$stmt = $this->DB->prepare( "SELECT *FROM complaints ORDER BY id DESC" );
		$stmt->execute();
		$table = '<table class="table table-hover">';
		$res = 
						'
						<thead class="thead-light">
						<tr>
					   		<th></th>
					   		<th>Id</th>
					   		<th>Title</th>
					   		<th>Message</th>
					   		<th>Date</th>
					   	</tr>
						</thead>					   	
					   	';
		;
		while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
			$res .= 
				   "<tr>
				   		<td></td>
				   		<td>".$row['id'].'</td>
				   		<td>'.$row['title'].'</td>
				   		<td>'.$row['message'].'</td>
				   		<td>'.$row['date'].'</td>
				   	</tr> ';
		}			
		$res .= 
				   '<tr>
				   		<td>'.$row['id'].'</td>
				   		<td>'.$row['title'].'</td>
				   		<td>'.$row['message'].'</td>
				   	</tr>';
		$tableEnd = '</table>';
		$res = $table.$res.$tableEnd;
		return $res;
	}
	
	public function getComplaint(){
		try{
			$stmt = $this->DB->prepare("SELECT *FROM complaints ORDER BY id DESC");
			$r = $stmt->execute();
			$table = '<table class="table table-hover">';
			$res = 
						'
						<thead class="thead-light">
						<tr>
					   		<th></th>
					   		<th>Id</th>
					   		<th>Title</th>
					   		<th>Message</th>
					   	</tr>
						</thead>					   	
					   	';
			;
			while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
				$res .= 
					   "<tr>
					   		<td></td>
					   		<td>".$row['id'].'</td>
					   		<td>'.$row['title'].'</td>
					   		<td>'.$row['message']."</td>
					   	</tr>";
			}			
			$res .= 
					   '<tr>
					   		<td>'.$row['id'].'</td>
					   		<td>'.$row['title'].'</td>
					   		<td>'.$row['message'].'</td>
					   	</tr>';
			$tableEnd = '</table>';
			$res = $table.$res.$tableEnd;
			return $res;
		}catch(PDOException $e){
			echo $e->getmessage();
		}
	}
	public function dltComplaint($id){
		$stmt = $this->DB->prepare("DELETE FROM complaints WHERE id = ?");
		$stmt->execute([$id]);
		$r = $stmt->rowcount();
		if($r)
			return true;
		else
			return false;		
	}
}
$db  = new Database(HOST,USER,PASSWORD,'hostel');
$ob  = new Complaint($db->make());
if(isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
 $_SERVER['HTTP_X_REQUESTED_WITH'] === 'dlt'){

	echo $ob->dltComplaint($_POST['id']);
 	die();
 }elseif( isset($_POST['title']) && isset($_POST['message']) && isset($_POST['reg'])  ){
 	
	$res = $ob->putComplaint($_POST['title'],$_POST['message'],$_POST['reg']);
 	if($res){
 		$loc  = $_SERVER['HTTP_REFERER'];
 		header("Location: ".$loc);
 		die();
 	}

 }
//  else{	
// 	$db  = new Database(HOST,USER,PASSWORD,'hostel');
// 	$com = new Complaint($db->make());
// 	echo $com->getComplaint();
//  	die();
// }













 ?>