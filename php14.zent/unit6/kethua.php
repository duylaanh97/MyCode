<?php 
	class DongVat{
		var $ten;
		var $tuoi;

		function an(){
			echo "<br> Phương thức ăn của động vật !";

		}
	}
	class Chim extends DongVat{
		var $mau_long;

		function bay(){
			echo "<br> Chim:" .$this->ten;
		}

	}
	$chim_sau = new Chim();
	$chim_sau ->an();


 ?>