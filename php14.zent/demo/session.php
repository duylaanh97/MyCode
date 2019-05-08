<?php 
	session_start();
	$info = array();
	$info['ID'] = "01";
	$info['Game'] = "Mario";
	$info['Year'] = "2013";
	$_SESSION['info'] = $info;
	
	if (isset($_SESSION['info']['Game'])) {
		echo $_SESSION['info']['Game'];
	}else{
		echo "no no no";
	}
	session_destroy();
	
 ?>