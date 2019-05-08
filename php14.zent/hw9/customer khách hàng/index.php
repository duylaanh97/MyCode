<?php 
	if (isset($_GET['mod'])) {
		$mod = $_GET['mod'];
	}else{
		$mod = 'Home';
	}

	if (isset($_GET['act'])) {
		$act = $_GET['act'];
	}else {

		$act = 'index';
	}

	
	switch ($mod) {

		case 'Home':
			echo "<br> Trang Chủ";

			switch ($act) {
				case 'index':
					echo "Đây Là Trang Chủ Khách Hàng";
					break;
				case 'add':
					echo "Đây Là Trang Thêm";
					break;
				case 'edit':
					echo "Đây Là Trang Sửa";
					break;
				case 'detail':
					echo "Đây Là Trang Chi Tiết";
					break;
				default:
					echo "404";
					break;
			}
			break;


		case 'customer':
			echo "<br> Trang Chủ ";
			include_once('controllers/customerControllers.php');
			$controller = new customerControllers;
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
					$controller->edit();;
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


		case 'login':
			include_once('controllers/loginControllers.php');
			$controller = new loginControllers;
			switch ($act) {
				case 'form':
					$controller->form();
					break;
				case 'login':
					$controller->login();
					break;
				case 'logout':
					$controller->logout();
					break;
				
				default:
					echo "Login Fail";
					break;
			}break;
			
			
		
		default:
			echo "404 Im Like TT";
			break;
	}

 ?>