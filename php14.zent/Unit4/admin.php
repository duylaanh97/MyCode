<?php
	session_start();

	if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
		echo "<br> Đăng Nhập thành công";
		echo "<br> Đây Là trang admin";
	}else {
		header('Location: login.html');
		exit;
	}
	

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<a href="Logout.php" title="">Thoát</a>
 </body>
 </html>