<?php 
	include_once('connect.php');
	// lấy toàn bộ data người dùng lên bằng POST
	$data = $_POST;
	unset($data['submit']);
	//chuẩn bị câu lệnh sql
	$sql = "INSERT INTO khach_hang (MaKH, TenKH , DiaChi , Phone, MoTa) VALUES ('".$data['MaKH']."', '".$data['TenKH']."','".$data['DiaChi']."','".$data['Phone']."','".$data['MoTa']."')";
	//thực thi câu lệnh

	$result = $conn->query($sql);
	//kiểm tra kết quả và trả về 
	if ($result==1) {
		setcookie('msg', 'Thêm Thành Công' , time()+5);
		header('location: theme.php');
	} else {
		setcookie('msg', 'Thêm Thất Bại' , time()+5);
		header('location: theme.php');
		
	}
 ?>
