<?php
	echo " <h1> Hello World ! </h1> <br>";
	echo "Ola Z";
	$name = " <br> Game Of The Year ";
	echo $name;
	echo "<br> <br> The Last of Us is " . $name;
	$slogan = " hot game ";
	echo "<br> Tomb raider is - $slogan";
	echo '<br> Tomb raider is - $slogan';
	echo "<br>";
	define('ID', 'Duylaanh97');
	define('Pass', 'Duylatao97');
	echo ID;
	echo "<br>";
	echo Pass;
	echo "<br>";
	$a = 100;
	$b = ($a == 101 ) ? 10 : 20;
	echo "b la :" . $b;
	echo "<br>";
	$b = ($a == 100 ) ? 10 : 20;
	echo " gia tri b la " . $b;
	echo "<br>";
	$numb = 51;
	if ($numb % 50 == 0){
		echo "$numb la so chan";
		}
		else {
			echo "$numb la so le";
		}
	echo "<br>";
	$numb = 9;
	if ($numb == 2){
		echo "Hom nay la thu 2";
	}
	else if ($numb == 3){
		echo "Hom nay la thu 3 ";
	}
	else if ($numb == 4){
		echo "Hom nay la thu 4 ";
	}
	else if ($numb == 5){
		echo "Hom nay la thu 5 ";
	}
	else if ($numb == 6){
		echo "Hom nay la thu 6";
	}
	else if ($numb == 7){
		echo "Hom nay la thu 7 ";
	}
	else if ($numb == 8){
		echo "Hom nay la chu nhat ";
	}
	else {
		echo "khong la thu nao ca";
	}
	echo "<br>";
	$numb = 10;
	switch ($numb) {
		case '2':{
			echo "hom nay la thu 2";
			}
			break;
		case '3': {
			echo "hom nay la thu 3";
		}
			# code...
			break;
		case '4':{
			echo "hom nay la thu 4";
		}
			# code...
			break;
		case '5':{
			echo "hom nay la thu 5";
		}
			# code...
			break;
		case '6':{
			echo "hom nay la thu 6";
		}
			# code...
			break;
		case '7':{
			echo "hom nay la thu 7";
		}
			# code...
			break;
		case '8':{
			echo "hom nay la chu nhat";
		}
			# code...
			break;
		default:{
			echo "khong la hom nao ca";
		}
		break;

		
	
}
?>