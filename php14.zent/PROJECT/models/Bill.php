<?php 
	class Bill{

		// var $table_name = 'hoadon';
		// var $primary_key = 'MaHD';

		function create($hoadon){

			include('Connection.php');

			$sql = "INSERT INTO hoadon (MaHD, MaKH , MaNV , NgayBan) VALUES ('".$hoadon['MaHD']."', '".$hoadon['MaKH']."','".$hoadon['MaNV']."','".$hoadon['NgayBan']."') ";
			$result = $conn->query($sql);

			return $result;

		}


		function update($ubill){

			include("Connection.php");

			$sql = "UPDATE hoadon SET TongTien ='".$ubill['TongTien']."' WHERE MaHD = '".$ubill['MaHD']."' ";

			$result = $conn->query($sql);

			return $result;
		}

		function find($maHD){

			include("Connection.php");

			$sql = "SELECT * FROM hoadon WHERE MaHD = '".$maHD."' ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			return $row;
		}

		function ListBillEmpl($Empl){

			if ($Empl == '') {
				$where = '';
			}else {
				$where = "WHERE hd.MaNV = '".$Empl."'";
			}

			$connection = new Connection();

			$product_conn = $connection->conn;

			$data = array();

			$query = "SELECT hd. *, kh.TenKH,nv.TenNV FROM hoadon hd join khachhang kh ON hd.MaKH = kh.MaKH JOIN  nhanvien nv ON nv.MaNV = hd.MaNV" . $where;

			$result = $product_conn->query($query);

			while ($row = $result->fetch_asscoc()) {
				$data[] = $row;
			}

			return $data;
		}

	}
 ?>