<?php 
//echo $_SERVER['QUERY_STRING'];
if(isset($_GET['uid']))
{
	$user_id=base64_decode($_GET['uid'])
	;
	include("connect.php");//$con
	$result=mysqli_query($con,"select *from register 
	where id=$user_id");
	if(mysqli_num_rows($result))
	{
		$row=mysqli_fetch_assoc($result);
		if($row['status']==0)
		{
			mysqli_query($con,"update register set 
			status=1 where id=$user_id");
			if(mysqli_affected_rows($con))
			{
				echo "Account Activated Succesfully";
			}
		}
		else
		{
			echo "Your Account Already Activated";
		}
	}
	else
	{
		echo "Sorry! Somwthing went Wrong";
	}
}

?>