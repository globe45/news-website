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
				<link href="css/style.css" rel="stylesheet">
			</head>
			<body>
				<div class="container">
					
					<!--Header Start-->
					<?php include("menu.php");?>
					<!--Header End-->
					
					<div class="content">
					
						<div class='profile-info'>
							<h1>Edit Profile</h1>
							<?php 
							if(isset($_REQUEST['status']))
							{
								echo "<p class='success'>
								UPdated Successfully</p>";
							}
							?>
							
							
							<?php 
							if(isset($_POST['update']))
							{
								$name=mysqli_real_escape_string($con,
								$_POST['uname']);
								$state=mysqli_real_escape_string($con,
								$_POST['state']);
								$gender=mysqli_real_escape_string($con,
								$_POST['gender']);
								
								if(is_uploaded_file($_FILES['image']['tmp_name']))
								{
									$filename=$_FILES['image']['name'];
									move_uploaded_file($_FILES['image']['tmp_name'],"profile/$filename");
								}
								else
								{
									$filename=$row['profile_pic'];		
								}
								mysqli_query($con,"update register set 
								username='$name',
								state='$state',
								profile_pic='$filename',
								gender='$gender' 
								where id=$logid");
								
								if(mysqli_affected_rows($con)>0)
								{
									header("location:edit.php?status=true");
								}
								else
								{
									echo "<p class='error'>Sorry! Unable to 
									Update or Nothing chnaged</p>";
								}
							}
							
							?>
							
							
						<form method="POST" action="" enctype="multipart/form-data">
							<table>
								<tr>
									<td>Username</td>
									<td><input type="text" name="uname" 
									value="<?php echo $row['username'] ?>"></td>
								</tr>
								<tr>
								<td><label>State</label></td>
								<td>
									<select name="state" id="state">
										<option value="">--state--</option>
										<option value="Telangana" 
										<?php if($row['state']=="Telangana") 
											echo "selected"; ?>>Telangana</option>
										<option value="Andhrapradesh" 
										<?php if($row['state']=="Andhrapradesh")
											echo "selected"; ?>>Andhrapradesh</option>
										<option value="Maharastra" <?php if($row['state']=="Maharastra") echo "selected"; ?>>Maharastra</option>
										<option value="Uttarapradesh" <?php if($row['state']=="Uttarapradesh") echo "selected"; ?>>Uttarapradesh</option>
										<option value="Bihar" <?php if($row['state']=="Bihar") echo "selected"; ?>>Bihar</option>
										<option value="Punjab" <?php if($row['state']=="Punjab") echo "selected"; ?>>Punjab</option>
									</select>
								</td>
							</tr>
							<tr>
							<td><label>Gender</label></td>
								<td>
									<Input type="radio" name="gender" value="Male" 
									id="gender" <?php if($row['gender']=="Male") 
										echo "checked"; ?> />Male
									<Input type="radio" name="gender" value="Female" 
									id="gender" <?php if($row['gender']=="Female")
										echo "checked"; ?>/>Female
								</td>
								</tr>
							<tr>
								<td>Update Profile Pic</td>
								<td><input type="file" name="image"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="update" 
								value="Update"></td>
								</tr>
							</table>
						</form>
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