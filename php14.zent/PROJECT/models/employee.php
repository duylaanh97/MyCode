<?php 
	class employee{

		function All(){

			include("Connection.php");

			$sql = "SELECT * FROM nhan_vien";

			$result = $conn->query($sql);

			$data = array();

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}

			return $data;
		}



		function create($data){

			include("Connection.php");

			$sql = "INSERT INTO nhan_vien (MaNV, TenNV , NamSinh , Que) VALUES ('".$data['MaNV']."', '".$data['TenNV']."', '".$data['NamSinh']."', '".$data['Que']."') ";

			$result = $conn->query($sql);

			return $result;


		}


		function update($data){

			include("Connection.php");

			$sql = "UPDATE nhan_vien SET MaNV ='".$data['MaNV']."', TenNV ='".$data['TenNV']."',NamSinh='".$data['NamSinh']."',Que='".$data['Que']."'  WHERE MaNV = '".$data['MaNV']."' ";

			$result = $conn->query($sql);

			return $result;

		}


		function delete($MaNV){

			include("Connection.php");

			$sql = "DELETE FROM nhan_vien WHERE MaNV = '".$MaNV."'";

			$result = $conn->query($sql);
			
			return $result;

		}

		function find($id){

			include("Connection.php");

			$sql = "SELECT * FROM nhan_vien WHERE MaNV = '".$id."' ";

			$result = $conn->query($sql);

			$row = $result->fetch_assoc();

			return $row;

		}


		function checkLogin($email, $mk){
			//Ket noi co so du lieu

			// Thong so ket noi CSDL
			$servername = "localhost";//255.123.45.21
			$username = "root";   // ten dang nhap
			$password = "";    // mat khau rong
			$dbname = "php14";   // db muon ket noi

			// Tao ra ket noi den CSDL Connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			$conn->set_charset("utf8"); // set utf-8 dể đọc dữ liệu tiếng Việt

			// Check Connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			// Cau lenh truy van co so du lieu


			$query = "SELECT * FROM nhan_vien WHERE Email = '".$email."' and Pass = '".$mk."'";
			
			$result = $conn->query($query)->fetch_assoc();

			return $result;




		}
	}


 ?>