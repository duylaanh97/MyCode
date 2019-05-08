<?php 
	require_once('models/Product.php');
	require_once('models/loaiSP.php');
	class ProductController{
		function index(){

			$product_model = new Product();

			$data = $product_model->All();
           
    		require_once ('views/product/index.php');
		}

		function add(){

			$product_type_model = new loaiSP();

			$loaisp = $product_type_model->All();
			require_once ('views/product/add.php');
		}

		function store(){

			$data = $_POST;
			unset($data['submit']);

			$product_model = new Product();

			$data = $product_model->create($data);

			if ($data==1) {
				echo "Thêm Thành Công";
				header('location: ?mod=product');
			}else {
				echo "Thêm Thất Bại";
				header('location: ?mod=product');
			}

		}


		function edit(){

			$product_type_model = new loaiSP();

			$loaisp = $product_type_model->All();

			$product_model = new Product();

			$maSP = $_GET['msp'];

			$row = $product_model->find($maSP);

			require_once ('views/product/edit.php');

		}

		function update(){
			$data = $_POST;
			unset($data['submit']);

			$product_model = new Product();

			$data = $product_model->update($data);

			if ($data==1) {
				echo "Cập Nhật Thành Công";
				header('location: ?mod=product');

			} else {
				echo "Cập Nhật Thất Bại";
				header('location: ?mod=product');
			}

		}

		function delete(){

			$product_model = new Product();

			$maKH = $_GET['mkh'];

			$status = $product_model->delete($maKH);

			if ($status==1) {
				echo "xóa Thành Công";
				header('location: ?mod=product');

			} else {
				echo "xóa Thất Bại";
				header('location: ?mod=product');
			}
		}

		function detail(){

			$id = $_GET['msp'];
			
            $product_model = new Product();

            $row = $product_model->find($id);

            require_once ('views/product/detail.php');


		}

		function error(){
			echo "không tồn tại..";
		}


	}
	


 ?>