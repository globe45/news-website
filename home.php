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
							<h1>Welcome To 
							<?php echo ucfirst($row['username']);?></h1>
						<table>
							<tr>
								<td>Username</td>
								<td><?php echo $row['username']?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $row['email']?></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><?php echo $row['password']?></td>
							</tr>
							<tr>
								<td>State</td>
								<td><?php echo $row['state']?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><?php echo $row['gender']?></td>
							</tr>
							<tr>
								<td>Date Of Reg</td>
								<td>
								<?php echo date("l,dS F Y h:i:s A",
								strtotime($row['date_of_reg']))?>
								</td>
							</tr>
							<tr>
								<td>Status</td>
								<td><?php echo $row['status']?></td>
							</tr>
						</table>
						</div><!--Content Div End-->
						<div class='profile-pic'>
						<h1>Some Content Goes here</h1>
						</div><!--Profile Pic div Ends-->
						
					</div>
				</div>
			</body>
		</html>	
	<?php
}
else
{
	header("location:login.php");
}


?>