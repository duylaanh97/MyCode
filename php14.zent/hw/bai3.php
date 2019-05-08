<?php 
	echo " <h1> Giai Phuong Trinh Bac 2 <br> ax^2 + bx + c = 0 </h1>";
	$a = 6;
	$b = -5;
	$c = 1;
	$delta = ($b*$b - 4*$a*$c);
	//Truong hop 1 a # 0
	if ($a != 0) {
		if ($delta > 0){
			echo " phuong trinh co 2 nghiem rieng biet : " . "x1 =" . (((-$b) + sqrt($delta)) / 2*$a) .  " va " . "x2 = " .  (((-$b) - sqrt($delta)) / 2*$a) ;
		}
		else if ($delta == 0) {
			echo " phuong trinh co 1 nghiem chung : " . " x1 = x2 = " . ((-$b) / 2*$a) ;
		}else {
			echo " phuong trinh vo nghiem ";
		}
		}
	//Truong hop 2 a = 0
	else {
		echo " Phuong trinh se chuyen thanh phuong trinh $b.x + $c = 0  va " ;
		if ($b > 0 && $c > 0 || $b < 0 && $c < 0) {
		echo " gia tri cua x la : " . -$c/$b ;
	}
	elseif ($b < 0 && $c > 0 || $b > 0 && $c <0) {
		echo " gia tri cua x la : " . $c/-$b ;
	}
	elseif ($c == 0 && $b != 0) {
		echo "gia tri cua x = 0";
	}
	elseif ($b == 0 && $c == 0) {
		echo " Phuong trinh co vo so nghiem ";
	}
	else {
		echo " phuong trinh khong co nghiem ";
	}

	}

		



	
 ?>	

