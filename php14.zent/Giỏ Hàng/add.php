<?php 
	session_start();

	$games = array();
	$games['SP1'] = array(
		'MaSP' => 'SP1',
		'TenSP' => 'TV',
		'SoLuong' => 20,
		'DonGia' => 5000000,
	);
	$games['SP2'] = array(
		'MaSP' => 'SP2',
		'TenSP' => 'KeyBroad',
		'SoLuong' => 10,
		'DonGia' => 3000000,
	);
	$games['SP3'] = array(
		'MaSP' => 'SP3',
		'TenSP' => 'PS4',
		'SoLuong' => 50,
		'DonGia' => 12000000,
	);
	$games['SP4'] = array(
		'MaSP' => 'SP4',
		'TenSP' => 'Screen',
		'SoLuong' => 60,
		'DonGia' => 11000000,
	);
	$games['SP5'] = array(
		'MaSP' => 'SP5',
		'TenSP' => 'Cam',
		'SoLuong' => 100,
		'DonGia' => 2000000,
	);


		// Bước 1: Lấy Ma SP người dùng đang chọn
		$maSP = $_GET['MaSP'];

	if(isset($_SESSION[$maSP])){
		$_SESSION[$maSP]['SoLuong']++;
		setcookie('noti','sdsadsaasd',time()+10);
	}else{
		// Bước 2: Lấy thông tin toàn bộ sản phẩm theo mã
		$game = $games[$maSP];
		setcookie('noti', 'Success', time() +1);

		// Bước 3: Gán số lượng về 1
		$game['SoLuong'] = 1;

		$_SESSION[$maSP] = $game;

	}

	

	header('Location: cart.php');
	

 ?>
