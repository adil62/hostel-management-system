<?php 

$uipPass   = "hoo";
$uipName   = "adil";
$hash = hash('gost',$uipPass.$uipName);
echo "<br>".$hash;

 ?>