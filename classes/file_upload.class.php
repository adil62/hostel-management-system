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
			return basename($this->name);
		else
			return 0;
	}

	public function set(){
		$this->tmp  = $this->file['tmp_name'];
		$this->name = $this->file['name']; 
	}
}