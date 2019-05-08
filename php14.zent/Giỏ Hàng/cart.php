<?php 
	session_start();



	function convert_number_to_words($number) {
 
		$hyphen      = ' ';
		$conjunction = '  ';
		$separator   = ' ';
		$negative    = 'âm ';
		$decimal     = ' phẩy ';
		$dictionary  = array(
		0                   => 'Không',
		1                   => 'Một',
		2                   => 'Hai',
		3                   => 'Ba',
		4                   => 'Bốn',
		5                   => 'Năm',
		6                   => 'Sáu',
		7                   => 'Bảy',
		8                   => 'Tám',
		9                   => 'Chín',
		10                  => 'Mười',
		11                  => 'Mười một',
		12                  => 'Mười hai',
		13                  => 'Mười ba',
		14                  => 'Mười bốn',
		15                  => 'Mười năm',
		16                  => 'Mười sáu',
		17                  => 'Mười bảy',
		18                  => 'Mười tám',
		19                  => 'Mười chín',
		20                  => 'Hai mươi',
		30                  => 'Ba mươi',
		40                  => 'Bốn mươi',
		50                  => 'Năm mươi',
		60                  => 'Sáu mươi',
		70                  => 'Bảy mươi',
		80                  => 'Tám mươi',
		90                  => 'Chín mươi',
		100                 => 'trăm',
		1000                => 'ngàn',
		1000000             => 'triệu',
		1000000000          => 'tỷ',
		1000000000000       => 'nghìn tỷ',
		1000000000000000    => 'ngàn triệu triệu',
		1000000000000000000 => 'tỷ tỷ'
		);
		 
		if (!is_numeric($number)) {
		return false;
		}
		 
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		// overflow
		trigger_error(
		'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		E_USER_WARNING
		);
		return false;
		}
		 
		if ($number < 0) {
		return $negative . convert_number_to_words(abs($number));
		}
		 
		$string = $fraction = null;
		 
		if (strpos($number, '.') !== false) {
		list($number, $fraction) = explode('.', $number);
		}
		 
		switch (true) {
		case $number < 21:
		$string = $dictionary[$number];
		break;
		case $number < 100:
		$tens   = ((int) ($number / 10)) * 10;
		$units  = $number % 10;
		$string = $dictionary[$tens];
		if ($units) {
		$string .= $hyphen . $dictionary[$units];
		}
		break;
		case $number < 1000:
		$hundreds  = $number / 100;
		$remainder = $number % 100;
		$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
		if ($remainder) {
		$string .= $conjunction . convert_number_to_words($remainder);
		}
		break;
		default:
		$baseUnit = pow(1000, floor(log($number, 1000)));
		$numBaseUnits = (int) ($number / $baseUnit);
		$remainder = $number % $baseUnit;
		$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
		if ($remainder) {
		$string .= $remainder < 100 ? $conjunction : $separator;
		$string .= convert_number_to_words($remainder);
		}
		break;
		}
		 
		if (null !== $fraction && is_numeric($fraction)) {
		$string .= $decimal;
		$words = array();
		foreach (str_split((string) $fraction) as $number) {
		$words[] = $dictionary[$number];
		}
		$string .= implode(' ', $words);
		}
		 
		return $string;
	}
		 
	$games = $_SESSION;
	

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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<?php echo $_COOKIE['noti'] ?>
	<?php 
		if (isset($_COOKIE['noti'])) { ?>
			<script> 
				Command: toastr["info"]("Thao Tác Thành Công!")

				toastr.options = {
				  "closeButton": false,
				  "debug": false,
				  "newestOnTop": false,
				  "progressBar": false,
				  "positionClass": "toast-top-right",
				  "preventDuplicates": false,
				  "onclick": null,
				  "showDuration": "300",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				}
			</script>
		<?php } ?>
		

	 
    <div class="container">
    	<a href="index.php" title="">Quay lại trang danh sách sản phẩm</a>
        <table class="table">
        	<caption>DANH SÁCH SẢN PHẨM TRONG GIỎ HÀNG</caption>
        	<thead>
        		<tr>
        			<th>STT</th>
        			<th>MÃ SẢN PHẨM</th>
        			<th>TÊN SẢN PHẨM</th>
        			<th>ĐƠN GIÁ</th>
        			<th>SỐ LƯỢNG</th>
        			<th>THÀNH TIỀN</th>
        			<th> </th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php 
        		$i=0;
        		$tong=0;
        		foreach ($games as $game) {
        			$i++;
        			$tong += $game['SoLuong']*$game['DonGia'];
        	?>
	        		<tr>
	        			<td><?= $i?></td>
	        			<td><?= $game['MaSP'] ?></td>
	        			<td><?= $game['TenSP'] ?></td>
	        			<td><?= number_format($game['DonGia']) ?></td>
	        			<td>
	        				<a href="add.php?MaSP=<?= $game['MaSP'] ?>" class="btn btn-info" title="">+</a>
	        				<?= $game['SoLuong'] ?>
	        				<a href="delete.php?MaSP=<?= $game['MaSP'] ?>" class="btn btn-danger" title="">-</a>
	        					
	        			</td>
	        			<td align="right"><?= number_format($game['SoLuong']*$game['DonGia']) ?></td>
	        			<td align="right"> <!-- <a href="delete.php?MaSP=<?= $game['MaSP'] ?>" class="btn btn-success" title=""> Xóa SP khỏi giỏ hàng</a> -->
	        				<button href="delete.php?MaSP=<?= $game['MaSP'] ?>" class="btn btn-success1" title=""> Xóa SP khỏi giỏ hàng</button>
	        			</td>
	        		</tr>
        	<?php } ?>
        		<tr>
        			<td colspan="5" ><b>Tổng tiền</b></td>
        			<td align="right"><?= number_format($tong) ?></td>
        		</tr>
        		<tr>
        			<td colspan="3" ><b>Bằng chữ:</b></td>
        			<td colspan="3" align="right"><?= convert_number_to_words($tong) ?> đồng </td>
        		</tr>
        	</tbody>
        </table>
    </div>
</body>
</html>
<script>
	$('.btn-success1').click(function(){
		var url = $(this).attr('href');
		// alert(url);



		swal({
	  	title: "Are you sure?",
	  	text: " Once deleted, you will not be able to recover this imaginary file!",
	  	icon: "warning",
	  	buttons: true,
	  	dangerMode: true,
		})
		.then((willDelete) => {
	  	if (willDelete) {

	  		window.location.href = url;
	    	swal("Poof! Your imaginary file has been deleted!", {
	      icon: "success",
	    });
	  	} else {
	    swal("Your imaginary file is safe!");
	  	}
		});
	});

		

</script>

