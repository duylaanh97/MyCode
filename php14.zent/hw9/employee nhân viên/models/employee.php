<?php 
	class employee{

		function All(){

			include("connection.php");

			$sql = "SELECT * FROM nhan_vien";

			$result = $conn->query($sql);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}



		function create($data){

			include("connection.php");

			$sql = "INSERT INTO nhan_vien (MaNV, TenNV , NamSinh , Que) VALUES ('".$data['MaNV']."', '".$data['TenNV']."', '".$data['NamSinh']."', '".$data['Que']."') ";

			$result = $conn->query($sql);

			return $result;


		}


		function update($data){

			include("connection.php");

			$sql = "UPDATE nhan_vien SET MaNV ='".$data['MaNV']."', TenNV ='".$data['TenNV']."',NamSinh='".$data['NamSinh']."',Que='".$data['Que']."'  WHERE MaNV = '".$data['MaNV']."' ";

			$result = $conn->query($sql);

			return $result;

		}


		function delete($MaNV){

			include("connection.php");

			$sql = "DELETE FROM nhan_vien WHERE MaNV = '".$MaNV."'";

			$result = $conn->query($sql);
			
			return $result;

		}

		function find($id){

			include("connection.php");

			$sql = "SELECT * FROM nhan_vien WHERE MaNV = '".$id."' ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			return $row;

		}
	}


 ?>