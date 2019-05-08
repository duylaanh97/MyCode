<?php 
	include_once('connect.php');
	$maSP = $_GET['msp'];

	$sql = "DELETE FROM san_pham WHERE MA_SP = '".$maSP."'";

	$result = $conn->query($sql);
	setcookie('msg' , ' Xóa Thành Công' , time()+5);

	header('location: theme.php');

 ?>