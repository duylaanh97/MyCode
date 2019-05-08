<?php 
	include_once('connect.php');
	$maKH = $_GET['mkh'];

	$sql = "DELETE FROM khach_hang WHERE MaKH = '".$maKH."'";

	$result = $conn->query($sql);
	setcookie('msg' , ' Xóa Thành Công' , time()+5);

	header('location: theme.php');

 ?>