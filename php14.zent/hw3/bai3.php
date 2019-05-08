<?php
        function kiem_tra_chuoi_palindrome($name)   
		{  
		  if ($name == strrev($name))  
			  return 1;  
		  else  
			  return 0;  
		}  
		echo kiem_tra_chuoi_palindrome('ASSA')."<br>";
?>