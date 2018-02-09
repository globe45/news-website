<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	include("connect.php");
	$logid=$_SESSION['loggedin'];
	
	$res=mysqli_query($con,"select *from register 
	where id=$logid");
	$row=mysqli_fetch_assoc($res);
	
	?>
		<html>
			<head>
				<title><?php echo $row['username']?> 
				Profile</title>
				<link href="css/style.css" 
				rel="stylesheet">
			</head>
			<body>
				<div class="container">
					
					<!--Header Start-->
					<?php include("menu.php") ?>
					<!--Header End-->
					
					<div class="content">
					
						<div class='profile-info'>
							<h1>Change Password</h1>
							
							<?php 
							if(isset($_POST['update']))
							{
								$opwd=md5($_POST['opwd']);
								$npwd=md5($_POST['npwd']);
								$cpwd=md5($_POST['cpwd']);
								if($opwd==$row['password'])
								{
									if($npwd==$cpwd)
									{
										mysqli_query($con,"update register set 
										password='$npwd' where id='$logid'");
										if(mysqli_affected_rows($con)>0)
										{
											echo "<p class='success'>
											Passwords Changed Successfully</p>";
										}
									}
									else
									{
										echo "<P class='error'>
										New and COnfirm Passwords Does not Match</p>";
									}
								}
								else
								{
									echo "<P class='error'>
									Old Password Does not Match with DB</p>";
								}
								
							}
							?>
							
							
						<table>
							<form method="POST" action="">
								<tr>
									<td>Enter Old Password</td>
									<td><input type='password' name="opwd"></td>
								</tr>
								<tr>
									<td>Enter New Password</td>
									<td><input type='password' name="npwd"></td>
								</tr>
								<tr>
									<td>Confirm New Password</td>
									<td><input type='password' name="cpwd"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type='submit' name="update"
									Value="Update"></td>
								</tr>
							</form>
						</table>
						</div><!--Content Div End-->
						<div class='profile-pic'>
							<h1>Some Com</h1>
						</div><!--Profile Pic div Ends-->
						
					</div>
				</div><!--Container End-->
			</body>
		</html>	
	<?php
}
else
{
	header("location:login.php");
}


?>