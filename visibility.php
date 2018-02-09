<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	include("connect.php");
	$id=$_SESSION['loggedin'];
	$nid=$_REQUEST['nid'];
	$result=mysqli_query($con,"select * from 
	news where id=$nid and userid=$id");
	$row=mysqli_fetch_assoc($result);
	if($row['status']==0)
	{
		mysqli_query($con,"update news set 
		status=1 where id=$nid and userid='$id'");
		header("Location:viewnews.php");
	}
	else
	{
		mysqli_query($con,"update news set 
		status=0 where id=$nid and userid='$id'");
		header("Location:viewnews.php");
	}
}
else
{
	header("location:login.php");
}
?>