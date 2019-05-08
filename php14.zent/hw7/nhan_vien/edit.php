<?php 
	include_once('connect.php');

	$data = $_POST;

	$query = "UPDATE nhan_vien SET MaNV ='".$data['MaNV']."', TenNV ='".$data['TenNV']."',NamSinh='".$data['NamSinh']."',Que='".$data['Que']."'  WHERE MaNV = '".$data['MaNV']."' ";


    $status = $conn->query($query);
  
  	if($status ==1){
    	setcookie('msg','Cập nhật thành công',time()+5);
  	}else{
    	setcookie('msg','Cập nhật không thành công',time()+5);
  	}	 

  	header('Location: theme.php');
 ?>