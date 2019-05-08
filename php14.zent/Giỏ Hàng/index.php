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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Game Store</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
    	<a href="cart.php" title="">Xem giỏ hàng</a>
        <table class="table">
        	<caption>DANH SÁCH SẢN PHẨM</caption>
        	<thead>
        		<tr>
        			<th>STT</th>
        			<th>MÃ SẢN PHẨM</th>
        			<th>TÊN SẢN PHẨM</th>
        			<th>ĐƠN GIÁ</th>
        			<th>SỐ LƯỢNG</th>
        			<th> </th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php 
        		$i=0;
        		foreach ($games as $game) {
        			$i++;
        	?>
	        		<tr>
	        			<td><?= $i?></td>
	        			<td><?= $game['MaSP'] ?></td>
	        			<td><?= $game['TenSP'] ?></td>
	        			<td><?= number_format($game['DonGia']) ?></td>
	        			<td><?= $game['SoLuong'] ?></td>
	        			<td> <a href="add.php?MaSP=<?= $game['MaSP'] ?>" class="btn btn-success" title="">Add to Cart</a> </td>
	        		</tr>
        	<?php } ?>
        	</tbody>
        </table>
    </div>
</body>
</html>
