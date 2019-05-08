<?php 
	session_start(); 

	$maSP = $_GET['MaSP'];

	if($_SESSION[$maSP]['SoLuong'] > 1){
		$_SESSION[$maSP]['SoLuong']--;
	}else{
		unset($_SESSION[$maSP]);
	}

	header('Location: cart.php');
 ?>
 