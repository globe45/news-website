<?php 
$a=200;
$b=300;
function add()
{
	$z=$GLOBALS['a']+$GLOBALS['b'];
	echo $z;
}
add();

?>