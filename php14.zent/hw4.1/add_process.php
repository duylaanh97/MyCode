<?php 
	session_start();

	$_SESSION['maSV'] = $_POST['ID'];

	header("location: list.php");

 ?>