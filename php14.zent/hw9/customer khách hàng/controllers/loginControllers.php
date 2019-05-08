<?php 
	include_once('models/customer.php');
	class loginControllers{

		function form(){

			if (isset($_SESION['isLogin'])) {
				header('Location: ?mod=customer&act=index');
			}

			include_once('views/customer/formLogin.php');
			
		}


		function login(){
			$email = $_POST['Email'];
			$mk = md5($_POST['Password']);

			$cusModel = new customer();

			$result = $cusModel->checkLogin($email, $mk);

			if ($result!=null) {
				$_SESION['isLogin']=true;
				$_SESION['user']=$result;

				header('Location: ?mod=customer&act=index');

			}else {
				header("Location: ?mod=login&act=form");
			}
		}


		function Logout(){

				header("Location: ?mod=login&act=form");
		}
	}

 ?> 	