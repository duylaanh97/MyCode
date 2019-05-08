<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "php14";

	$conn = new mysqli($servername , $username , $password, $dbname);
	$conn->set_charset("utf8");

	$sql = "SELECT * FROM san_pham";

	$result = $conn->query($sql);
	
	
		
	

	if ($conn->connect_error) {
		die("connect failed :" .$conn->connect_error);

	}

	


 ?>