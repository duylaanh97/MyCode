<?php 
	require_once('models/customer.php');
	class customerControllers{

		function index(){

			$customer_model = new customer();

			$data = $customer_model->All();

			require_once('views/customer/index.php');
		}

		function add(){

			require_once('views/customer/add.php');
		}

		function store(){

			$data = $_POST;
			unset($data['submit']);

			$customer_model = new customer();

			$data = $customer_model->create($data);

			if ($data==1) {
				echo "Thêm Thành Công";
				header('location: ?mod=customer');
			}else{
				echo "Thêm Thất Bại";
				header('location: ?mod=customer');
			}

		}

		function edit(){

			$customer_model = new customer();

			$maKH = $_GET['mkh'];

			$row = $customer_model->find($maKH);

			require_once('views/customer/edit.php');

		}

		function update(){

			$data = $_POST;

			unset($data['submit']);

			$customer_model = new customer();

			$data = $customer_model->update($data);

			if ($data==1) {
				echo "Cập Nhật Thành Công";
				header('location: ?mod=customer');
			}else{
				echo "Cập Nhật Thất Bại";
				header('location: ?mod=customer');
			}


		}

		function delete(){

			$customer_model = new customer();

			$maKH = $_GET['mkh'];

			$data = $customer_model->delete($maKH);

			if ($data==1) {
				echo "Xóa Thành Công";
				header('location: ?mod=customer');
			}else {

				echo "Xóa Thất Bại";
				header('location: ?mod=customer');
			}


		}


		function detail(){

			$id = $_GET['mkh'];

			$customer_model = new customer();

			$row = $customer_model->find($id);

			require_once('views/customer/detail.php');

		}


		function error(){
			echo "Không Tồn Tại TT";
		}
	}

 ?>