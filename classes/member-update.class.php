<?php 
require_once("database.class.php");
class MemberUpdate {
	public $regNum ;
	public $updateTag ;
	public $updateValue ;
	function __construct(PDO $obj){
		$this->DB = $obj;
	}
	public function set($name,$val){
		$this->regNum      = $name == 'regNum'      ? $val : $this->regNum;
		// echo $this->regNum;
		$this->updateTag   = $name == 'updateTag'   ? $val : $this->updateTag;
		$this->updateValue = $name == 'updateValue' ? $val : $this->updateValue;
	}
	public function update(){
		// echo $this->updateValue,$this->regNum;
		$stmt = $this->DB->prepare("UPDATE members SET $this->updateTag = ? WHERE user_reg = ?");
		// echo "updating <br>".$this->updateTag.$this->updateValue;
		$res  = $stmt->execute([$this->updateValue,$this->regNum]);
		// var_dump($res);
		return $res;
	}
	public function getAll(){
		$stmt = $this->DB->prepare("SELECT *FROM members WHERE user_reg = ?");
		$stmt->execute([$this->regNum]);
		$res  = $stmt->fetch(PDO::FETCH_OBJ);
		// var_dump($res);
		return [
			 'user_name'   		 => $res->user_name,
			 'user_branch' 		 => $res->user_branch,
			 'user_year'   		 => $res->user_year,
			 'user_reg'	   		 => $res->user_reg,
			 'user_email'  		 => $res->user_email,
			 'user_phone'  		 => $res->user_phone,
			 'user_address'		 => $res->user_address,
			 'user_parent_phone' => $res->user_parent_phone,
			 'user_gender'       => $res->user_gender,
			 'user_room'         => $res->user_room
		];

	}
	public function displayAll(){
		$resAr = $this->getAll();
		// print_r($resAr);
		return json_encode($resAr);
	}
}

if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
 $_SERVER['HTTP_X_REQUESTED_WITH'] === 'Ajax') {
 	if( isset($_POST['reg_no']) && !empty($_POST['reg_no']) ){
		$db = new Database(HOST,USER,PASSWORD,'hostel');
	 	$ob = new MemberUpdate( $db->make() );
	 	// echo("regnO :".$_POST['reg_no']);
		$ob->set('regNum',$_POST['reg_no'] );
		$jsonDATA = $ob->displayAll();
		echo $jsonDATA;
    }
}elseif( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
 $_SERVER['HTTP_X_REQUESTED_WITH'] === 'AjaxUPDATE' ){
 	if( !empty($_POST['update_value']) && !empty($_POST['update_name']) && !empty($_POST['reg_no']) ){
		$db = new Database(HOST,USER,PASSWORD,'hostel');
	 	$ob = new MemberUpdate( $db->make() );
		$ob->set("updateValue",$_POST['update_value']);
		$ob->set("regNum"     ,$_POST['reg_no']);
		$ob->set("updateTag"  ,$_POST['update_name'] );
		echo $ob->update();
	}
}else{
	if(filter_has_var(INPUT_POST, 'reg_no')){
		
	}
}


