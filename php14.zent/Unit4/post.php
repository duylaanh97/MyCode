<?php
	session_start();
	if (isset($_POST['user'])) {
	 	$user = $_POST['user'];
	 }
	if (isset($_POST['pwd'])) {
	 	$pwd = $_POST['pwd'];
	 } 
	 // print_r($_GET);
	if ($user == 'admin' && $pwd == '123') {
		$_SESSION['isLogin'] = true;
		header('Location: admin.php');
	}else {
		echo "<br> Đăng nhập thất bại !";
	}

 ?>