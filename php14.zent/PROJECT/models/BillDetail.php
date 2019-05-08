<?php 
	class BillDetail{

		function All(){
			
			include("Connection.php");

			$sql = "SELECT * FROM chi_tiet_hoa_don";

			$result = $conn->query($sql);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}

		function find($id){

			include("Connection.php");

			$sql = "SELECT * FROM chi_tiet_hoa_don WHERE MaHD = '".$id."' ";

			$result = $conn->query($sql);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}


		function create($prod){

			include("Connection.php");

			$sql = "INSERT INTO chi_tiet_hoa_don (MaHD, MaSP , SoLuong , GiaBan, ThanhTien) VALUES ('".$prod['MaHD']."', '".$prod['MaSP']."','".$prod['SoLuong']."','".$prod['GiaBan']."','".$prod['ThanhTien']."')";
			$result = $conn->query($sql);

			return $result;
		}

		// function __construct($prod){
		// 	include("Connection.php");

		// 	$sql = "INSERT INTO chi_tiet_hoa_don (MaHD, MaSP , SoLuong , GiaBan, ThanhTien) VALUES ('".$prod['MaHD']."', '".$prod['MaSP']."','".$prod['SoLuong']."','".$prod['GiaBan']."','".$prod['ThanhTien']."')";

		// 	$result = $conn->query($sql);

		// 	return $result;
		// }
	}

 ?>