<?php
	$name = "pHạM lÊ dUy";
	$name = mb_ucwords($name);
	function mb_ucwords($name)
	{
		return mb_convert_case($name, MB_CASE_TITLE , 'UTF-8');
	}
	echo $name;
 ?>