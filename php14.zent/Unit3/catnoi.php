<?php
  
  	$name ="Zent Group - Be all you can be !";

	// Cat chuoi theo ky tu mong muon
	$data = explode(" ",$name);

	echo "<pre>";
	print_r($data);
	echo "</pre>";



	// Ghép chuoi theo ky tu mong muon
	$name = implode(" ",$data);

	echo $name;
?>