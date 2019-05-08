<?php
	if (isset($_GET['user'])) {
	 	$user = $_GET['user'];
	 }
	if (isset($_GET['pwd'])) {
	 	$pwd = $_GET['pwd'];
	 } 
	 // print_r($_GET);
	if ($user == 'admin' && $pwd == '123') {
		echo "<br> Đăng nhập thành công !";
	}else {
		echo "<br> Đăng nhập thất bại !";
	}

 ?>