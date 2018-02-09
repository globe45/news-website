<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	include("connect.php");
	$uid=$_SESSION['loggedin'];
	$result=mysqli_query($con,"select *from register where id=$uid");
	$row=mysqli_fetch_assoc($result);
	//to display news in form boxes
	$nid=$_REQUEST['nid'];
	$news=mysqli_query($con,"select *from news where id=$nid and userid=$uid");
	$nrow=mysqli_fetch_assoc($news);
	
	?>
		<html>
			<head>
				<title><?php echo ucfirst($row['username']);?> Profile</title>
				<link rel="stylesheet" href="css/style.css">
			</head>
			<body>
				<DIV class="container">
					<?php include("menu.php");?>
					<div class="content">
						<h2>Edit News</h2>
						
						<?php 
						if(isset($_POST['update']))
						{
							$cat=mysqli_real_escape_string($con,$_POST['category']);
							$desc=mysqli_real_escape_string($con,$_POST['desc']);
							$title=mysqli_real_escape_string($con,$_POST['title']);
							if(is_uploaded_file($_FILES['image']['tmp_name']))
							{
								$filename=$_FILES['image']['name'];
								move_uploaded_file($_FILES['image']['tmp_name'],"news/$filename");
							}
							else
							{
								$filename=$nrow['filename'];
							}
							
							mysqli_query($con,"update news set category='$cat',
								title='$title',
								description='$desc',
								filename='$filename'
								where id=$nid and userid=$uid
							");
							if(mysqli_affected_rows($con)>0)
							{
								header("Location:editnews.php?nid=$nid&msg=true");
							}
							else
							{
								echo "Sorry Unable to Update";
							}
							
						}
						?>
						<?php 
						if(isset($_REQUEST['msg']))
						{
							echo "<p class='success'>UPdated Successfully</p>";
						}
						?>
						
						<form action="" method="POST" 
						enctype="multipart/form-data">
							<table>
								<tr>
									<td>Select Category:</td>
									<td><select name="category">
										<option value="">--category--</option>
										<option value="Politics" <?php if($nrow['category']=="Politics") echo "selected"?>>Politics</option>
										<option value="Movies" <?php if($nrow['category']=="Movies") echo "selected"?>>Movies</option>
									</select></td>
								</tr>
								<tr>
									<td>News Title</td>
									<td><Input type="text" value="<?php echo $nrow['title']?>" name="title"></td>
								</tr>
								<tr>
									<td>Description</td>
									<td><textarea name="desc"><?php echo $nrow['description'] ?></textarea></td>
								</tr>
								<tr>
									<td>Upload News Image</td>
									<td><Input type="file" name="image"><br>
										<img src="news/<?php echo $nrow['filename']?>" height="40" width="40">
									</td>
								</tr>
								<tr>
									<td></td>
									<td><br><Input type="submit" name="update"
									Value="Update News"></td>
								</tr>
							</table>
						</form>
					</div>
				</DIV>
			</body>
		</html>
	<?php
	
}
else
{
	header("location:login.php");
}
?>