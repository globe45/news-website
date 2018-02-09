<html>
	<head>
		<title>News</title>
		<link href="css/main-style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<?php include("mainmenu.php");
				include("connect.php");
				if(isset($_REQUEST['nid']))
				{
					$nid=$_REQUEST['nid'];
					$article=mysqli_query($con,"select 
					*from news where id=$nid");
				}
				else
				{
					header("location:index.php");
				}
				
			?>
			<div class="body-content">
			
				<div class="article-content">
					<?php 
					if(mysqli_num_rows($article))
					{
						$arow=mysqli_fetch_assoc($article);
						?>
							<h1><?php echo $arow['title'] ?></h1>
							<img src="news/<?php echo $arow['filename']?>" 
							height="300" width="400">
							<p><?php echo $arow['description']?></p>
							<p><b>Posted By: <?php echo $arow['posted_by']?>
							&nbsp;|&nbsp; 
							Posted On:<?php echo $arow['date_posted']?></b></p>
						<?php
					}
					else
					{
						echo "<P>Sorry! No article found</p>";
					}
					?>
				</div>
				<div class='right-side-bar'>
					<h2>Related...</h3>
					<?php 
					$result=mysqli_query($con,"select *from news where id !=$nid and status=1");
					if(mysqli_num_rows($result))
					{
						echo "<ul>";
						while($row=mysqli_fetch_assoc($result))
						{
							?>
								<li><a href="news.php?nid=<?php echo $row['id']?>"><?php echo $row['title']?></a></li>
							<?php
						}
						echo "</ul>";
					}
					else
					{
						echo "Sorry! No Articles Found";
					}
					?>
				</div>
				
				
			</div>
		</div>
	</body>
</html>