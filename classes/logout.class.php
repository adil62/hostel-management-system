<?php 
session_start();
require("../config.php");
class Logout{
	public $user;
	public function verify(){
		if( isset($_SESSION['logged']) && isset($_SESSION['name']) ){
			setcookie(session_name(), '', 100);
			session_unset();
			session_destroy();
			$_SESSION = array();
			echo "logged out";
			$loc = DOCROOT.'/index.php';
			header("Location: $loc");
			return true;
		}else{
			return false;
		}
	}
}
$ob = new Logout();
$ob->verify();




















 ?>