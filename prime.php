<?php 
$n=20;
for($i=2;$i<=$n;$i++)
{
	for($k=2;$k<$i;$k++)
	{
		if($i%$k==0)
		{
			break;
		}
	}
	if($i==$k)
	{
		echo $k."<br>";
	}
}

?>