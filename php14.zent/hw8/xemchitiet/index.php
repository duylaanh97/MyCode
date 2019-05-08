<?php 
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
			include_once('controllers/ProductControllers.php');
			$controller = new ProductController;
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				case 'add':
					$controller->add();
					break;
				default:
					$controller->error();
					break;

				}break;

		case 'employee':
			echo "<br> <center> Trang chủ </center> <br> <center> Nhân Viên </center> ";
			include_once('controllers/ProductControllers.php');
			$controller = new ProductController;
			switch ($act) {
				case 'index':
					$controller->index();
					break;
				case 'add':
					$controller->add();
					break;
				case 'list':
					$controller->list();
					break;
				default:
					echo "404 khách hàng k có";
					break;
				}
				break;


		
		default:
			echo "404  TT";
			break;
	}
 ?>