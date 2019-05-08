<?php 
	class Game
	{
		var $MaSP;
		var $TenSP;
		var $SoLuong;
		var $DonGia;
		var $HangSX;

		function Intt(){
			echo "<br> <h3> THÔNG TIN SẢN PHẨM </h3>";
			echo "<br> Mã Game :" . $this->MaSP;
			echo "<br> Tên Game :" . $this->TenSP;
			echo "<br> Số Lượng Game :" . $this->SoLuong;
			echo "<br> Giá Game :" . $this->DonGia;
			echo "<br> Hãng Game :" . $this->HangSX;
		}
	}

	$Game1 = new Game();
	$Game1->MaSP = "01";
	$Game1->TenSP = "Mario";
	$Game1->SoLuong = "10";
	$Game1->DonGia = "2000000";
	$Game1->HangSX = "Nintendo";

	$Game2 = new Game();
	$Game2->MaSP = "02";
	$Game2->TenSP = "CSGO";
	$Game2->SoLuong = "100";
	$Game2->DonGia = "200000";
	$Game2->HangSX = "Valve";

	$Game3 = new Game();
	$Game3->MaSP = "03";
	$Game3->TenSP = "GR";
	$Game3->SoLuong = "50";
	$Game3->DonGia = "1200000";
	$Game3->HangSX = "Sony";

	$Game3->Intt();
	$Game2->Intt();
	$Game1->Intt();



 ?>