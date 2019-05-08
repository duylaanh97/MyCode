<?php  
	session_start();
	include_once('helpers/Middleware.php');
	$middleware = new Middleware();


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

	// echo $mod."<br>".$act;
	switch ($mod) {

		case 'Home':
			switch ($act) {
				case 'index':
					include_once('public/Layouts/header.php');
					echo " <h1> <center> Đây Là Trang Chủ  </center> </h1>";
					include_once('public/Layouts/footer.php');
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


		case 'employee':
			
			$middleware->isLogin();
			include_once('controllers/employeeControllers.php');
			$controller = new employeeControllers;
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


		case 'product':
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



		case 'home':
			$middleware->isLogin();
			include_once('controllers/homeControllers.php');
			$controller = new homeControllers();
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				default:
					$controller->error();
					break;
			}
			break;


		case 'sale':
			include_once('controllers/saleControllers.php');
			$controller = new saleControllers;
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				case 'create_bill':
					$controller->create_bill();
					break;
				case 'purchase':
					$controller->purchase();
					break;
				case 'sale':
					$controller->sale();
					break;
				case 'add2cart':
					$controller->add2cart();
					break;
				case 'remove_product':
					$controller->remove_product();
					break;
				case 'payment':
					$controller->payment();
					break;
				case 'bill_detail':
					$controller->bill_detail();
					break;
				case 'bill_list':
					$controller->bill_list();
					break;
				case 'destroy':
					$controller->destroy();
					break;
				default:
					$controller->error();
					break;
			}
			break;
			
			
		
		default:
			echo "404 Im Like TT";
			break;
	}

 ?>