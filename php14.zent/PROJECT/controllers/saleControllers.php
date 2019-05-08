<?php 
	include_once('models/Bill.php');
	include_once('models/BillDetail.php');
	include_once('models/Product.php');
	include_once('models/customer.php');
	include_once('models/employee.php');

	class saleControllers{


		function index(){

			$bill = new Bill();
			$data = $bill->ListBillByEmpl();

			require_once('views/sale/bill.php');
		}

		function bill_list(){

			$bill = new Bill();
			$data = $bill->bill_list();

			require_once('views/sale/bill_list.php');
		}


		function create_bill(){

			$productModel = new customer();
			$data = $productModel->All();
			require_once('views/sale/customer.php');
		}


		function purchase(){
			if (isset($_GET['mkh'])) {
				$maKH = $_GET['mkh'];

				$customerModel = new customer();
				$customer = $customerModel->find($maKH);
				$_SESSION['customer'] = $customer;
				// print_r($_SESSION['customer']);die;


				header('Location: ?mod=sale&act=sale');
			}else {

				header('Location: ?mod=sale&act=create_bill');
			}
		}


		function sale(){
			// die('ok');

			if (isset($_SESSION['customer'])) {
				$customer = $_SESSION['customer'];

				$productModel = new Product();

				$products = $productModel->All();

				$cart = array();

				if (isset($_SESSION['cart'])) {
					$cart = $_SESSION['cart'];

				}
				
				require_once('views/sale/sale.php');
			}else {
				header('Location: ?mod=sale&act=create_bill');
			}
		}

		function add2cart(){

			$maSP = $_GET['Ma_SP'];
			if (isset($_SESSION['cart'][$maSP])) {
				$_SESSION['cart'][$maSP]['SoLuong'] = $_SESSION['cart'][$maSP]['SoLuong'] + 1;

			}else{

				$productModel = new Product();

				$product = $productModel->find($maSP);

				$product['SoLuong'] = 1;
				$_SESSION['cart'][$maSP] = $product; 
			}

			header('Location: ?mod=sale&act=sale');
		}


		function remove_product(){

			$maSP = $_GET['MA_SP'];
			// die($maSP);
			if ($_SESSION['cart'][$maSP]['SoLuong'] == 1) {
				unset($_SESSION['cart'][$maSP]);


			}else{

				$_SESSION['cart'][$maSP]['SoLuong'] = $_SESSION['cart'][$maSP]['SoLuong'] - 1;
			}

			header('Location: ?mod=sale&act=sale');

		}


		function payment(){

			$productModel = new Product();

			$maNV = 'NV01';
			$customer = $_SESSION['customer'];
			$cart = $_SESSION['cart'];

			$hoadon = array();
			$hoadon['MaHD'] = $customer['MaKH'].'_'.$maNV.'_'.time();
			$hoadon['MaKH'] = $customer['MaKH'];
			$hoadon['MaNV'] = $maNV;
			$hoadon['NgayBan'] = date('Y-m-d H:i:s');
			
			//thêm hóa đơn
			$bill = new Bill();
			$bill->create($hoadon);

			//chi tiết hóa đơn và số SP trong kho

			$tong_tien = 0;
			foreach ($cart as $product) {
				$prod['MaHD'] = $hoadon['MaHD'];
				$prod['MaSP'] = $product['MA_SP'];
				$prod['SoLuong'] = $product['SoLuong'];
				$prod['GiaBan'] = $product['GIA_BAN'];
				$prod['ThanhTien'] = $product['GIA_BAN'] * $product['SoLuong']; 
				 // print_r($prod);
				$tong_tien += $prod['ThanhTien'];
				$billDetail = new BillDetail();
				$billDetail->create($prod);
				$productModel->reduceQuant($prod['MaSP'], $prod['SoLuong']);
			}

			//update tổng tiền của hóa đơn
			$ubill['MaHD'] = $hoadon['MaHD'];
			$ubill['TongTien'] = $tong_tien;
			$bill->update($ubill);

			//Hủy session customer và cart
			unset($_SESSION['cart']);
			unset($_SESSION['customer']);

			header('location: ?mod=sale&act=bill_detail&MaHD=' . $hoadon['MaHD']);

		}


		function bill_detail(){

			$maHD = $_GET['MaHD'];
			$bill = new Bill();
 
			$hoadon = $bill->find($maHD);

			$customerModel = new customer();
			$customer = $customerModel->find($hoadon['MaKH']);

			$billDetail = new BillDetail();
			$employeeModel = new employee();

			$productModel = new Product();


			$data= $billDetail->find($maHD);
			// header("Location: views/sale/bill_detail.php");	
			require_once('views/sale/bill_detail.php');

		}

		function destroy(){

			unset($_SESSION['cart']);
			header('Location: ?mod=sale&act=sale');
		}


		function error(){

			echo "Không Tồn Tại Sale";
		}

	}

 ?>