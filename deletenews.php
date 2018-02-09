<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	$uid=$_SESSION['loggedin'];
	$did=$_REQUEST['did'];
	include("connect.php");
	mysqli_query($con,"delete from news where id=$did and userid=$uid");
	if(mysqli_affected_rows($con)==1)
	{
		header("location:viewnews.php?delete=1");
	}
}
else
{
	header("location:login.php");
}

?>