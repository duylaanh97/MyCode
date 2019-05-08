<?php 
	class Connection{

		var $connect;

		function __construct(){

			//Ket noi co so du lieu

			// Thong so ket noi CSDL
			$servername = "localhost";//255.123.45.21
			$username = "root";   // ten dang nhap
			$password = "";    // mat khau rong
			$dbname = "php14";   // db muon ket noi

			// Tao ra ket noi den CSDL connection
			$this->connect = new mysqli($servername, $username, $password, $dbname);

			$this->connect->set_charset("utf8"); // set utf-8 dể đọc dữ liệu tiếng Việt

			// Check connection
			if ($this->connect->connect_error) {
			    die("Connection failed: " . $this->connect->connect_error);
			}

			// Cau lenh truy van co so du lieu
		}
	}


 ?>