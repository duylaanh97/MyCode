<?php 
	echo "<h1>
	Giai Phuong Trinh Bac Nhat ax + b = 0
	</h1> <br>";
	$a = 2;
	$b = 6;
	if ($a > 0 && $b > 0 || $a < 0 && $b < 0) {
		echo " gia tri cua x la : " . -$b/$a ;
	}
	elseif ($a < 0 && $b > 0 || $a > 0 && $b <0) {
		echo " gia tri cua x la : " . $b/-$a ;
	}
	elseif ($b == 0 && $a != 0) {
		echo "gia tri cua x = 0";
	}
	elseif ($a == 0 && $b == 0) {
		echo " Phuong trinh co vo so nghiem ";
	}
	else {
		echo " phuong trinh khong co nghiem ";
	}


 ?>