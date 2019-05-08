<?php 
	require_once('models/employee.php');
	class employeeControllers{

		function index(){

			$employee_model = new employee();

			$data = $employee_model->All();

			require_once('views/employee/index.php');
		}

		function add(){

			require_once('views/employee/add.php');
		}

		function store(){

			$data = $_POST;
			unset($data['submit']);

			$employee_model = new employee();

			$data = $employee_model->create($data);

			if ($data==1) {
				echo "Thêm Thành Công";
				header('location: ?mod=employee');
			}else{
				echo "Thêm Thất Bại";
				header('location: ?mod=employee');
			}

		}

		function edit(){

			$employee_model = new employee();

			$maNV = $_GET['mnv'];

			$row = $employee_model->find($maNV);

			require_once('views/employee/edit.php');

		}

		function update(){

			$data = $_POST;

			unset($data['submit']);

			$employee_model = new employee();

			$data = $employee_model->update($data);

			if ($data==1) {
				echo "Cập Nhật Thành Công";
				header('location: ?mod=employee');
			}else{
				echo "Cập Nhật Thất Bại";
				header('location: ?mod=employee');
			}


		}

		function delete(){

			$employee_model = new employee();

			$maNV = $_GET['mnv'];

			$data = $employee_model->delete($maNV);

			if ($data==1) {
				echo "Xóa Thành Công";
				header('location: ?mod=employee');
			}else {

				echo "Xóa Thất Bại";
				header('location: ?mod=employee');
			}


		}


		function detail(){

			$id = $_GET['mnv'];

			$employee_model = new employee();

			$row = $employee_model->find($id);

			require_once('views/employee/detail.php');

		}


		function error(){
			echo "Không Tồn Tại TT";
		}
	}

 ?>