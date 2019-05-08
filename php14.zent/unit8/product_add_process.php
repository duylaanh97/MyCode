<?php 
	include_once('connect.php');
	// lấy toàn bộ data người dùng lên bằng POST
	$data = $_POST;
	unset($data['submit']);
	//chuẩn bị câu lệnh sql
	$sql = "INSERT INTO san_pham (MA_SP, TEN_SP , SO_LUONG , GIA_NHAP , GIA_BAN, MA_LOAI_SP) VALUES ('".$data['MA_SP']."', '".$data['TEN_SP']."','".$data['SO_LUONG']."','".$data['GIA_NHAP']."','".$data['GIA_BAN']."','".$data['MA_LOAI_SP']."')";
	//thực thi câu lệnh

	$result = $conn->query($sql);
	//kiểm tra kết quả và trả về 
	if ($result==1) {
		echo "Thêm Thành Công";

	} else {
		echo "Thêm Thất Bại";
	}
 ?>
