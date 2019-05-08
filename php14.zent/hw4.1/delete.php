<?php 
	session_start();

	$maSV = $_GET['ID'];

	if (isset($_GET['ID'])) {
		unset($_GET['ID']);
	}
	header('Location:list.php');
 ?>
 