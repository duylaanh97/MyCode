<?php 
	class loaiSP{

		function All(){

			include("Connection.php"); 

            $query = "SELECT * FROM loai_san_pham ";

    // Thuc thi cau lenh truy van co so du lieu
    		$result = $conn->query($query);

    		$data = array();

    		while ($row = $result->fetch_assoc()) { 

    			$data[] = $row;	
		}

		return $data;
		}
	}

 ?>