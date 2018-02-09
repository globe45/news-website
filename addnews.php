<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	$id=$_SESSION['loggedin'];
	include("connect.php");
	$result=mysqli_query($con,"select *from 
	register where id=$id");
	$row=mysqli_fetch_assoc($result);
	
	?>
		<html>
			<head>
				<title>
				<?php 
				echo ucfirst($row['username']);
				?> Profile</title>
				<link href="css/style.css"
				rel="stylesheet">
			</head>
			<body>
				<div class="container">
					<?php include("menu.php");?>
					<div class="content">
						<h1>Add News</h1>
						<?php 
						if(isset($_REQUEST['status']))
						{
							echo "<p class='success
					'>News Addeed Successfully</p>";
						}
						?>
						<?php 
						if(isset($_POST['add']))
						{
							$cat=mysqli_real_escape_string($con,
							$_POST['category']);
							$title=mysqli_real_escape_string($con,
							$_POST['title']);
							$desc=mysqli_real_escape_string($con,
							$_POST['desc']);
							if(is_uploaded_file($_FILES['image']['tmp_name']))
							{
								$filename=$_FILES['image']['name'];
								move_uploaded_file($_FILES['image']['tmp_name'],
								"news/$filename");
							}
							else
							{
								$filename="";
							}
							date_default_timezone_set("Asia/Calcutta");
							$date=date("Y-m-d h:i:s a");
							$ip=$_SERVER['REMOTE_ADDR'];
							$by=$row['username'];
							$by_id=$row['id'];
							
							mysqli_query($con,"insert into news(
							category,
							title,
							description,
							filename,
							date_posted,
							posted_by,
							userid,
							ip
							) values('$cat','$title','$desc','$filename',
							'$date','$by','$by_id','$ip')");
							if(mysqli_affected_rows($con)==1)
							{
								header("location:addnews.php?status=1");
							}
							else
							{
								echo "Sorry! Unable to Insert";
							}
							
						}
						?>
						
						<form action="" method="POST" 
						enctype="multipart/form-data">
							<table>
								<tr>
									<td>Select Category:</td>
									<td><select name="category">
										<option value="">--category--</option>
										<option value="Politics">Politics</option>
										<option value="Movies">Movies</option>
									</select></td>
								</tr>
								<tr>
									<td>News Title</td>
									<td><Input type="text" name="title"></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="desc"></textarea></td>
								</tr>
								<tr>
									<td>Upload News Image</td>
									<td><Input type="file" name="image"></td>
								</tr>
								<tr>
									<td></td>
									<td><br><Input type="submit" name="add"
									Value="Add News"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</body>
		</html>
	<?php
	
}else
{
	header("Location:login.php");
}