<?php 

	include_once("Connection.php");

	class Model {


		var $conn;
		var $table_name = '';
		var $primary_key = '';

		function __construct(){

			$obj_connect = new Connection();

			$this->conn = $obj_connect->connect;

		}

		function All(){
			 
            $query = "SELECT * FROM " . $this->table_name;

    // Thuc thi cau lenh truy van co so du lieu
    		$result = $this->conn->query($query);

    		$data = array();

    		while ($row = $result->fetch_assoc()) { 

    			$data[] = $row;	
		}

		return $data;
	}


		function find($input){

		    // Cau lenh truy van co so du lieu
		    $query = "SELECT * FROM " . $this->table_name . " WHERE " . $this->primary_key .  " = '".$input."' " ;


		    // Thuc thi cau lenh truy van co so du lieu
		    $result = $this->conn->query($query);

		    $row = $result->fetch_assoc();
		    return $row;
		}


		function create($data){

			$fields = '';
			$value = '';

			foreach ($$data as $key => $value) {

				$fields .= $key . ',';
				$value .= "'".$value."', ";
				
			};

			$fields = trim($fields, ',');
			$value = trim($value, ',');

			$sql = "INSERT INTO " .$this->table_name. "(".$fields.") VALUES (".$value.")";

			$result = $this->conn->query($sql);

			return $result;
		}

		function update($data){

			$query = '';

			foreach ($$data as $key => $value) {
				$query .= $key ."= '".$value."', ";
			}

			$query = trim($query, ',');

			$sql = "UPDATE ". $this->table_name. "SET" . $query. "WHERE" . $this->primary_key. " = '" . $data[$this->primary_key]."'";

			$result = $this->conn->query($sql);

			return $result;
		}


		function delete($input){

			$query = "DELETE FROM " . $this->table_name." WHERE " . $this->primary_key . "= '".$input."'";

			$result = $this->conn->query($sql);

			return $result;
		}

}
	
 ?>