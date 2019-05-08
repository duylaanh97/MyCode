<?php
$result="";
$i=1;
$n=7;
while ($i<=$n)
{
$space = str_repeat("&nbsp", $n-$i);
$character = str_repeat("#", 2*$i-$i);
$result .= $space . $character."<br/>";
$i++;
}
echo $result;
?>