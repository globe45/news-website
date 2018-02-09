<?php 
session_start();
if(isset($_SESSION['loggedin']))
{
	$uid=$_SESSION['loggedin'];
	include("connect.php");
	$result=mysqli_query($con,"select *from 
	register where id=$uid");
	$row=mysqli_fetch_assoc($result);
	?>
		<html>
			<head>
				<title><?php echo ucfirst($row['username']);?> Profile</title>
				<link href="css/style.css" rel="stylesheet">
			</head>
			<body>
				<div class="container">
					<?php include("menu.php")?>
					<div class="content">
						<h2>View News</h2>
						<?php 
						if(isset($_REQUEST['delete']))
						{
							echo "<p class='success'>Record Deleted Successfully</p>";
						}
						?>
						
						
						<?php 
						$news=mysqli_query($con,"select *from news 
						where userid=$uid");
						if(mysqli_num_rows($news)>0)
						{
							?>
								<table border=1>
									<tr>
										<th>S.No</th>
										<th>Category</th>
										<th>Title</th>
										<th>Description</th>
										<th>Image</th>
										<th>posted By</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<?php 
									$i=1;
									while($rec=mysqli_fetch_assoc($news))
									{
										?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo $rec['category']?></td>
												<td><?php echo $rec['title']?></td>
												<td><?php echo substr($rec['description'],0,100)?></td>
												<td><img height="50" width="50" 
												src="news/<?php echo $rec['filename']?>"></td>
												<td><?php echo $rec['posted_by']?></td>
												<td><?php echo $rec['status']?></td>
												<td>
													<a href="editnews.php?nid=<?php echo $rec['id']?>">Edit</a>
													<a onclick="deleteRecord(<?php echo $rec['id'];?>)" href="javascript:void(0)">Delete</a>
													<?php if($rec['status']==0){?>
														<a href="visibility.php?nid=
														<?php echo $rec['id']?>">Show</a>
													<?php 
													}
													else
													{
														?>
														<a href="visibility.php?nid=
														<?php echo $rec['id']?>">Hide</a>
														<?php
													}
													?>
												</td>
											</tr>
										<?php
										$i++;
									}//while loop ends
									?>
								</table>
							<?php
						}
						else
						{
							echo "Sorry! No Articles found, please 
							<a href='addnews.php'>Add News</a> Now";
						}
						?>
					</div>
				</div>
				<script>
					function deleteRecord(id)
					{
						var x=confirm("do you want to Delete?")
						if(x==true)
						{
							window.location="deletenews.php?did="+id;
						}
						
					}
				</script>
			</body>
		</html>
	<?php
}
else
{
	header("Location:login.php");
}
?>