<?php 
	include_once('connect.php');
	$maNV = $_GET['mnv'];

	$sql = "DELETE FROM nhan_vien WHERE MaNV = '".$maNV."'";

	$result = $conn->query($sql);
	setcookie('msg' , ' Xóa Thành Công' , time()+5);

	header('location: theme.php');

 ?>