<?php 
$con=mysqli_connect("localhost",
		"root","","9am");
$result=mysqli_query($con,
		"select *from users");

$row=mysqli_fetch_OBJECT($result);
echo "<pre>";
print_r($row);
		
		
		
		
		
		
		
?>