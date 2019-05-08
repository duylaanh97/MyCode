<?php 

	include_once("Connection.php");

	class Product {

		// var $table_name = 'san_pham';
		// var $primary_key = 'MA_SP';


		function All(){

			include("Connection.php");

			$sql = "SELECT * FROM san_pham";

			$result = $conn->query($sql);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}



		function create($data){

			include("Connection.php");

			$sql = "INSERT INTO san_pham (MA_SP, TEN_SP , SO_LUONG , GIA_NHAP, GIA_BAN , MA_LOAI_SP) VALUES ('".$data['MA_SP']."', '".$data['TEN_SP']."','".$data['SO_LUONG']."','".$data['GIA_NHAP']."','".$data['GIA_BAN']."' , '".$data['MA_LOAI_SP']."') ";

			$result = $conn->query($sql);

			return $result;


		}


		function update($data){

			include("Connection.php");

			$sql = "UPDATE san_pham SET MA_SP ='".$data['MA_SP']."', TEN_SP ='".$data['TEN_SP']."',SO_LUONG='".$data['SO_LUONG']."',GIA_NHAP='".$data['GIA_NHAP']."',GIA_BAN ='".$data['GIA_BAN']."'  WHERE MA_SP = '".$data['MA_SP']."' ";

			$result = $conn->query($sql);

			return $result;

		}


		function delete($maSP){

			include("Connection.php");

			$sql = "DELETE FROM san_pham WHERE MA_SP = '".$maSP."'";

			$result = $conn->query($sql);
			
			return $result;

		}

		function find($id){

			include("Connection.php");

			$sql = "SELECT * FROM san_pham WHERE MA_SP = '".$id."' ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			return $row;
		}
	
		function getQuant($maSP){

			include("Connection.php");

			$query = "SELECT SO_LUONG FROM san_pham WHERE MA_SP = '".$maSP."' ";

			$result = $conn->query($query)->fetch_assoc()['SO_LUONG'];

			return $result;

		}


		function reduceQuant($maSP, $SoLuong){

			include("Connection.php");

			$soLuongCon = $this->getQuant($maSP) - $SoLuong;

			$query = "UPDATE san_pham SET SO_LUONG = $soLuongCon WHERE MA_SP = '".$maSP."' ";

			$result = $conn->query($query);

			return $result; 

		}

		

	}


 ?>