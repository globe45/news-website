<?php 
if(isset($_REQUEST['uid']))
{
	$id=base64_decode($_REQUEST['uid']);
}
else
{
	header("location:index.php");
}
?>
<html>
	<head>
		<title>Forgot Password</title>
		<link href="css/main-style.css" rel="stylesheet">
		
	</head>
	<body>
	<div class="container">
		<?php include("mainmenu.php")?>
		<div class='body-content'>
		<h1>Reset Password</h1>
		
		<?php 
			include("connect.php");
			if(isset($_POST['update']))
			{
				$pwd=md5($_POST['pwd']);
				$cpwd=md5($_POST['cpwd']);
				if($pwd==$cpwd)
				{
					mysqli_query($con, "update register
					set password='$pwd' where id=$id");
					if(mysqli_affected_rows($con))
					{
						echo "Passwords Changed Successfully. Please Login now";
					}
				}
				else
				{
					echo "Passwordss Does not Match";
				}
			}
		?>
		
		<table>
			<form method="POST" action="">
				<tr>
					<td><label>New  Password</label></td>
					<td>
						<input type="password" name="pwd" >
					</td>
				</tr>
				<tr>
					<td><label>Confirm New  Password</label></td>
					<td>
						<input type="password" name="cpwd" 
						>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<input type="submit" name="update"
						value="Update">
						
						</td>
				</tr>
			</form>
		</table>
		</div>
	</div>
	</body>
</html>