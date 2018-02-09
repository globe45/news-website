<html>
	<head>
		<title>Home</title>
		<link href="css/main-style.css" 
		rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<?php include("mainmenu.php");?>
			<div class="body-content">
			<div class="movies">
				<h1>Movies</h1>
				<?php 
				include("connect.php");
				$movies=mysqli_query($con,"select 
				*from news where category='Movies' 
				and status=1");
				if(mysqli_num_rows($movies))
				{
					while($mrow=mysqli_fetch_assoc($movies))
					{
						?>
<div class="article">
<a href="news.php?nid=
<?php echo $mrow['id']?>">
	<img 
	src="news/<?php echo $mrow['filename']?>">
</a>
	<h3><a href="news.php?nid=<?php echo $mrow['id']?>">
	<?php echo $mrow['title'] ?></a></h3>
<p><?php echo substr($mrow['description'],0,100);?></p>
<a href="news.php?nid=<?php echo $mrow['id']?>"
 class="readmore">ReadMore</a>
</div>
						<?php
					}
				}
				else
				{
					echo "<p>Sorry No Articles Found</p>";
				}
				?>
				</div>
				
				<div class="politics">
				<h1>Politics</h1>
				<?php 
				include("connect.php");
				$politics=mysqli_query($con,"select *from news where 
				category='Politics' and status=1");
				if(mysqli_num_rows($politics))
				{
					while($prow=mysqli_fetch_assoc($politics))
					{
						?>
							<div class="article">
								<a href="news.php?nid=<?php echo $prow['id']?>">
									<img src="news/<?php echo $prow['filename']?>">
									
								</a>
								<h3><a href="news.php?nid=<?php echo $prow['id']?>">
								<?php echo $prow['title'] ?></a></h3>
								<p><?php echo substr($prow['description'],0,100);?></p>
								<a href="news.php?nid=<?php echo $prow['id']?>"
								class="readmore">ReadMore</a>
							</div>
						<?php
					}
				}
				else
				{
					echo "<p>Sorry No Articles Found</p>";
				}
				?>
				</div>
				
				
			</div>
		</div>
	</body>
</html>