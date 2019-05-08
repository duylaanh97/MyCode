<?php 
	include_once('models/employee.php');
	class loginControllers{

		function form(){

			if (isset($_SESION['isLogin'])) {
				header('Location: ?mod=employee&act=index');
			}

			include_once('views/login/login.php');
			
		}


		function login(){
			$email = $_POST['Email'];
			$mk = $_POST['Password'];

			$emModel = new employee();

			$result = $emModel->checkLogin($email, $mk);
			
			if ($result!=null) {
				$_SESION['isLogin']=true;
				$_SESION['user']=$result;

				header('Location: ?mod=employee&act=index');

			}else {
				header("Location: ?mod=login&act=form");
			}
		}


		function Logout(){

				session_destroy();

				header("Location: ?mod=login&act=form");
		}
	}

 ?> 	