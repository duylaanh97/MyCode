<?php 

	
	echo "<pre>";
		print_r($_GET);
	echo "</pre>";

	if (isset($_GET['class'])) {
		$class = $_GET['class'];
	echo "<br> bạn đang học lớp :" . $class;

	}

	if (isset($_GET['unit'])) {
		$class = $_GET['unit'];
	echo "<br> bạn đang học bài số:" . $unit;

	}

	if (isset($_GET['ex'])) {
		$class = $_GET['ex'];
	echo "<br> bạn đang làm bài số :" . $ex;

	}
 

	
	
	
 ?>