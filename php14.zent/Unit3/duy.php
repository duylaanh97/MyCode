<?php 
	kiem_tra_chan_le(1.3);
	function kiem_tra_chan_le ($num){
		if ($num % 2 ==0) {
			echo " $num  la so chan";
		}else {
			echo " $num  la so le";
		}
	} 



	var_dump(kiem_tra_chan_le2(11));
	$num = 11;
	$lang = $_GET['lang'];

	if (kiem_tra_chan_le2($num) == true && $lang == 'vi') {
		echo "<br> $num la so chan";
	}else if (kiem_tra_chan_le2($num) == true && $lang == 'en') {
		echo " <br> $num is even number";
	}else if (kiem_tra_chan_le2($num) == false && $lang == 'vi') {
		echo " <br> $num la so le";
	}else if (kiem_tra_chan_le2($num) == false && $lang == 'en') {
		echo " <br> $num is odd number";
	}

	function kiem_tra_chan_le2($num){
		if ($num %2 == 0) {
			return true;
		}else{
			return false;
		}
	}







	$a = 10;
	$b = 20;
	if ($lang == 'vi') {
		echo " <br> tong a + b la :" . tinh_tong($a,$b);
	}else {
		echo "<br> sum a + b is :" . tinh_tong($a,$b);
	}

	function tinh_tong ($a,$b){
		return ($a - $b);
	}
 ?>	