<?php 
	include_once('connect.php');

	$data = $_POST;

	$query = "UPDATE san_pham SET MA_SP ='".$data['MA_SP']."', TEN_SP ='".$data['TEN_SP']."',SO_LUONG='".$data['SO_LUONG']."',GIA_NHAP='".$data['GIA_NHAP']."',GIA_BAN ='".$data['GIA_BAN']."'  WHERE MA_SP = '".$data['MA_SP']."' ";


    $status = $conn->query($query);
  
  	if($status ==1){
    	setcookie('msg','Cập nhật thành công',time()+5);
  	}else{
    	setcookie('msg','Cập nhật không thành công',time()+5);
  	}	 

  	header('Location: theme.php');
 ?>