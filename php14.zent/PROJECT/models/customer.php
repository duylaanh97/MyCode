<?php 
	class customer{

		function All(){

			include("Connection.php");

			$sql = "SELECT * FROM khach_hang";

			$result = $conn->query($sql);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}



		function create($data){

			include("Connection.php");

			$sql = "INSERT INTO khach_hang (MaKH, TenKH , DiaChi , Phone, MoTa) VALUES ('".$data['MaKH']."', '".$data['TenKH']."','".$data['DiaChi']."','".$data['Phone']."','".$data['MoTa']."')";

			$result = $conn->query($sql);

			return $result;


		}


		function update($data){

			include("Connection.php");

			$sql = "UPDATE khach_hang SET MaKH ='".$data['MaKH']."', TenKH ='".$data['TenKH']."',DiaChi='".$data['DiaChi']."',Phone='".$data['Phone']."',MoTa ='".$data['MoTa']."'  WHERE MaKH = '".$data['MaKH']."' ";

			$result = $conn->query($sql);

			return $result;

		}


		function delete($MaKH){

			include("Connection.php");

			$sql = "DELETE FROM khach_hang WHERE MaKH = '".$MaKH."'";

			$result = $conn->query($sql);
			
			return $result;

		}

		function find($id){

			include("Connection.php");

			$sql = "SELECT * FROM khach_hang WHERE MaKH = '".$id."' ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			return $row;
		}
	}


 ?>