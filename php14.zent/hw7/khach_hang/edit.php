<?php 
	include_once('connect.php');

	$data = $_POST;

	$query = "UPDATE khach_hang SET MaKH ='".$data['MaKH']."', TenKH ='".$data['TenKH']."',DiaChi='".$data['DiaChi']."',Phone='".$data['Phone']."',MoTa ='".$data['MoTa']."'  WHERE MaKH = '".$data['MaKH']."' ";


    $status = $conn->query($query);
  
  	if($status ==1){
    	setcookie('msg','Cập nhật thành công',time()+5);
  	}else{
    	setcookie('msg','Cập nhật không thành công',time()+5);
  	}	 

  	header('Location: theme.php');
 ?>