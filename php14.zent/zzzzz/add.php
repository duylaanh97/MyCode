<?php 
	include_once('connect.php');
	// lấy toàn bộ data người dùng lên bằng POST
	$data = $_POST;
	unset($data['submit']);
	//chuẩn bị câu lệnh sql
	$sql = "INSERT INTO san_pham (MA_SP, TEN_SP , SO_LUONG , GIA_NHAP, GIA_BAN) VALUES ('".$data['MA_SP']."', '".$data['TEN_SP']."','".$data['SO_LUONG']."','".$data['GIA_NHAP']."','".$data['GIA_BAN']."')";
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
