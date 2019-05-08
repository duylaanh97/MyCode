<?php
$i = 1;
$j = 2;
for($j=1; $j <= 10; $j++) 
{ 
echo "<pre>"; 
for ($i=2; $i <= 9; $i++) 
{ 
echo "<td> $i * $j = ".$i*$j."</td>"; 
} 
echo "</pre>"; 
}


?>