<?php
if(isset($_GET['p'])){
	if( $_GET['p'] === 'update'){
		echo ' updatebody';
	}
	elseif($_GET['p'] === 'delete'){
		echo ' deley e body';
	}else{
		echo ' default add e body';
	}
}else
echo ' default add e body';

