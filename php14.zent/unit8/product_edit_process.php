<?php 
	include_once('connect.php');
	// lấy toàn bộ data người dùng lên bằng POST
	$data = $_POST;
	unset($data['submit']);
	//chuẩn bị câu lệnh sql
	$sql = "UPDATE san_pham SET MA_SP = '".$data['MA_SP']."', TEN_SP = '".$data['TEN_SP']."', SO_LUONG = '".$data['SO_LUONG']."', GIA_NHAP = '".$data['GIA_NHAP']."', GIA_BAN  = '".$data['GIA_BAN']."', MA_LOAI_SP = '".$data['MA_LOAI_SP']."'";
	//thực thi câu lệnh

	$result = $conn->query($sql);
	//kiểm tra kết quả và trả về 
	if ($result==1) {
		echo "Cập Nhật Thành Công";

	} else {
		echo "Cập Nhật Thất Bại";
	}
 ?>
