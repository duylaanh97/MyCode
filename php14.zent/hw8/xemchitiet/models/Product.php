<?php 
	class Product {
		
		function All(){
			include("connection.php"); 
            $query = "SELECT * FROM nhan_vien ";

    // Thuc thi cau lenh truy van co so du lieu
    		$result = $conn->query($query);

    		$data = array();

    		while ($row = $result->fetch_assoc()) { 

    			$data[] = $row;	
		}

		return $data;
	}

		function Find($id){

			include("connection.php");
			$sql = "SELECT * FROM nhan_vien WHERE MaNV = '".$id."' ";

			$result = $conn->query($sql);

    		$data = array();

    		while ($row = $result->fetch_assoc()) { 

    			$data[] = $row;	
		}

		return $data;

		}

}


	
 ?>