<?php 
	$info = array();
	$info = array(

		'id' => '61',
		'Name' => 'Duy',
		'phone' => '1345600',
		'email' => 'duy@gmail.com', 
	);

	if (array_key_exists('Name', $info)) {
		echo " Name  ". $info['Name']; 	
	}else {
		echo " khong  ton tai key nay";
	}


	 $index = array_search('duy@gmail.com', $info);    
     
     if($index !== FALSE){
         echo "<br> Vị trí phần tử là: " . $index;
     }else{
         echo "<br> Không tìm thấy phần tử";
     }


    $arr = array(1,3,1,5,"zent",1,5,"zent");

  	$arr_result = array_count_values($arr);

  	echo "<pre>";
    print_r($arr_result);
  	echo "</pre>";
  	






 ?>