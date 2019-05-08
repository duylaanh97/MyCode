<?php
$result="";
$i=7;
$n=7;
while ($i>=1)
{
$space = str_repeat("&nbsp", $n-$i);
$character = str_repeat("#", 2*$i-$i);
$result .= $space . $character."<br/>";
$i--;
}

echo $result;
?>