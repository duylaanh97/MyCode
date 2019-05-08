<?php 
	require_once('models/Product.php');
	class ProductController{
		function index(){
			//phương thức xem danh sách

			$product_model = new Product();

			$data = $product_model->All();
           
    		require_once ('views/product/index.php');
		}

		function add(){
			require_once ('views/product/add.php');
		}

		function list(){

			//phương thức xem chi tiết

			$product_model = new Product();

			$data = $product_model->All();

			require_once ('views/product/list.php');
		}

		function detail(){

			$product_model = new Product();

			$MaNV = $_GET['maNV'];

			$data = $product_model->Find($MaNV);

			require_once ('views/product/list.php');

		}

		function store(){
			echo "<br> add process";

		}
		function error(){
			echo "không tồn tại..";
		}
	}
	


 ?>