<?php 
$f1=0;
$f2=1;
$n=10;
//echo $f1."<br>".$f2."<br>";
echo $f1;
echo "<br>";

echo $f2;
echo "<br>";

for($i=0;$i<=$n;$i++)
{
	$f3=$f1+$f2;
	echo $f3;
	echo "<br>";
	$f1=$f2;
	$f2=$f3;
}

?>