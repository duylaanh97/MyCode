<?php 
	include_once('models/customer.php');

	class saleControllers{

		function purchase(){

			if (isset($_GET['MaKH'])) {
				$maKH = $_GET['MaKH'];

				$customerModel = new customer();
				$customer = $customerModel->find($maKH);

				$_SESION['customer'] = $customer;

				header('Location: ?mod=sale&act=sale');



			}else {

				header('Location: ?mod=create_bill');
			}
		}


		function sale(){

			if (isset($_SESION['customer'])) {
				$customer = $_SESION['customer'];

				$pro
			}
		}
	}

 ?>