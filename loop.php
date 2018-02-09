<style>
div{
	float:left;
	border:1px solid;
	margin:5px;
}
</style>
<?php
$start=2;
$end=20;
for($i=2;$i<=$end;$i++)
{
	echo "<div>";
	for($k=1;$k<=10;$k++)
	{
		echo $i."*".$k."=".$i*$k;
		echo "<br>";
	}
	echo "</div>";
}


/*for($i=1;$i<=10;$i++)
{
	if($i%2==0)//0-even | 1-Odd
	{
		echo $i;
		echo '<br>';
	}
}
*/

/*for($i=10;$i>=1;$i--)
{
	echo $i;
	echo "<br>";
}
*/


/*In the above loop $i=0, we will get even numbers
				    $i=1, we will get Odd Numbers	*/
 ?>