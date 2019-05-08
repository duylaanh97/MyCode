<?php 
	session_start();
	include_once('helpers/Middleware.php');
	
	if (isset($_GET['mod'])) {
		$mod = $_GET['mod'];

	}else {
		$mod = 'home';

	}

	if (isset($_GET['act'])) {
		$act = $_GET['act'];

	}else{
		$act = 'index';

	}

	switch ($mod) {
		case 'home':
			echo "<br> Trang chủ ";

			switch ($act) {
				case 'index':
					echo "<br> Đây là trang chủ";
					break;
				case 'add':
					echo "<br> Thêm mới";
					break;
				default:
					echo "404";
					break;
				}break;

		case 'product':
			echo "<br> Trang chủ/ sản phẩm ";
			include_once('controllers/ProductController.php');
			$controller = new ProductController;
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				case 'add':
					$controller->add();
					break;
				case 'store':
					$controller->store();
					break;
				case 'edit':
					$controller->edit();
					break;
				case 'update':
					$controller->update();
					break;
				case 'delete':
					$controller->delete();
					break;
				case 'detail':
					$controller->detail();
					break;
				default:
					$controller->error();
					break;

				}break;

		case 'employee':
			echo "<br> Trang chủ/ khách hàng ";
			switch ($act) {
				case 'index':
					echo "<br> Đây là trang chủ khách hàng";
					break;
				case 'add':
					echo "<br> Thêm mới khách hàng";
					break;
				default:
					echo "404 khách hàng k có";
					break;
				}
				break;

		case 'login':
			echo "<br> Đăng Nhập/ khách hàng ";
			include_once('controller/LoginController.php');
			$controller = new LoginController;
			switch ($act) {
				case 'form':
					$controller->form();
					break;
				}
				break;


		
		default:
			echo "404  TT";
			break;
	}
 ?>