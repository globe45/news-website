<?php 
$arr=array(10,20,30,40,50,60,70,80,90,100);
echo end($arr);
echo end($arr);

//echo end($arr);
/*echo current($arr);
echo "<br>";
echo next($arr);
echo "<br>";
echo next($arr);//20
echo "<br>";


echo end($arr);//100
echo "<br>";

echo prev($arr);

echo current($arr);
*/
/*
$e=10;
if(in_array($e,$arr))
{
	$pos=array_search($e,$arr);
	unset($arr[$pos]);
	echo $e." Was Deleted!....";
	echo "<pre>";
	print_r($arr);
}
else
{
	echo "Sorry Element Not Found";
}
*/


/*
$arr=array(10,20,30,40,50,60,70,80,90,100);
$fa=array_splice($arr,3,2,200);
echo "<pre>";
//$fa=array_slice($arr,4,0);
print_r($fa);
*/
/*$fa=array_slice($arr,4);
//from 4th position get all elements
$fa=array_slice($arr,4,4);//
//form 4th position it will get only 4 elemnts
echo "<pre>";
print_r($fa);
*/



/*$arr=array(
		"subject"=>"PHP",
		"institute"=>"Naresh",
	);
$ar=array_flip($arr);
echo "<pre>";
print_r($ar);*/




//echo array_key_exists("subject",$arr);

//echo IN_ARRAY("php",$arr);



/*$arr=array(10,20,30,40,50);
echo in_array(50,$arr);//1
*/
//echo array_search(50,$arr);//4
//

/*echo array_shift($arr);//50
echo "<pre>";
print_r($arr);
*/


/*$arr=array(10,20,30,40,50,20,30,40,100);
echo "<pre>";
$arr=array_unique($arr);
print_r($arr);
//shuffle($arr);
*/



//$arr=array_reverse($arr);





/*$a1=array(10,20,30,40,60,70);
$a2=array(100,200,300,400);
$a3=array(1,2,3,4);
$fa=array_merge($a1,$a2,$a3);
echo "<pre>";
print_r($fa);
*/




//$arr=array(10,10.7,"hi",true);
//echo array_sum($arr);//21.7
//echo array_product($arr);//0



/*$arr=array(
		"subject"=>"PHP",
		"institute"=>"Naresh",
		"city"=>"Hyderabad",
		"state"=>"Telangana",
		"pincode"=>500038,
	);
//krsort($arr);//DESC
ksort($arr);//ASC
echo "<pre>";
print_r($arr);
*/

/*$arr=array("k","b","a","x","p");
echo rsort($arr);
echo "<pre>";
print_r($arr);
*/


//echo count($arr);
//echo sizeof($arr);
/*$arr=array(
		array(10,20,30),
		array(100,200,300),
		array("a","b"),
		array("PHP","MySQL","COdeIgniter","Wordpress"),
	);
echo "<pre>";
//print_r($arr);

echo $arr[2][1];
echo $arr[3][1];
	
	
echo count($arr,1);//16
*/


?>