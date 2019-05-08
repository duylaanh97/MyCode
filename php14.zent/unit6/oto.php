<?php 
	class Oto
{
    var $ten;
    var $hang_xe;
    var $mau;
    var $so_cho;

    function chay(){
        echo  "Đây  là phương thức chạy của lớp Ô tô";
    }

    function intt(){
    	echo "<br> <h3> ThÔNG TIN XE</h3>";
		echo "<br> Tên xe: " . $this->ten;
		echo "<br> Hãng xe: " . $this->hang_xe;
		echo "<br> Màu : " . $this->mau;
		echo "<br> Số Chỗ : " . $this->so_cho;
		}

		/*function__construct(){
			echo "Phương thức khởi tạo";
		}*/
	}

	$bmw = new Oto();
	$bmw -> chay();
	$bmw->ten = "BMW";
	$bmw->hang_xe = "BMW - blalba";
	$bmw->mau = "Đỏ";
	$bmw->so_cho = 5;

	/*echo "<br> <h3> ThÔNG TIN XE</h3>";
	echo "<br> Tên xe: " . $bmw->ten;
	echo "<br> Hãng xe: " . $bmw->hang_xe;
	echo "<br> Màu : " . $bmw->mau;
	echo "<br> Số Chỗ : " . $bmw->so_cho;*/

	$bmw -> intt();



	$bmw = new Oto();
	$bmw->ten = "BMW";
	$bmw->hang_xe = "BMW - blalba";
	$bmw->mau = "Đỏ";
	$bmw->so_cho = 5;

	echo "<br> <h3> ThÔNG TIN XE</h3>";
	echo "<br> Tên xe: " . $bmw->ten;
	echo "<br> Hãng xe: " . $bmw->hang_xe;
	echo "<br> Màu : " . $bmw->mau;
	echo "<br> Số Chỗ : " . $bmw->so_cho;

 ?>