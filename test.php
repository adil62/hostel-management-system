<?php require_once($_SERVER['DOCUMENT_ROOT'].'/projects/hostel/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="b_img">
	<input type="submit" name="submit">
</form>
</body>
</html>
<?php  
class Upload{
	public $name;
	public $tmp;  
	public $file; 
	public $dir;  
	
	function __construct($file,$loc){
		$this->file = $file;
		$this->dir  = $loc;
	}

	public function upload(){
		$this->set();
		if( move_uploaded_file( $this->tmp, $this->dir.basename($this->name) ) )
			return 1;
		else
			return 0;
	}

	public function set(){
		$this->tmp  = $this->file['tmp_name'];
		$this->name = $this->file['name']; 
	}


}
if( isset($_FILES['b_img'])){
	$name = $_FILES['b_img']['name'];
	$tmp  = $_FILES['b_img']['tmp_name'];
	$file = new Upload( $_FILES['b_img'],$_SERVER['DOCUMENT_ROOT'].'/projects/hostel/test/' );
	echo $file->upload();
}	