<div class="header">
	<ul class="menu">
		<li><a href="home.php">Home</a></li>
		<li><a href="edit.php">Edit</a></li>
		<li><a href="addnews.php">Add News</a></li>
		<li><a href="viewnews.php">View News</a></li>
		<li><a href="change_pwd.php">Change 
		Password</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<div class='avatar'>
		<?php 
		if($row['profile_pic']=="")
		{
			?>
			<img src="profile/dummy.jpeg">
			<?php 
		}
		else
		{
			?>
				<img src="profile/<?php echo $row['profile_pic'] ?>">
			<?php
		}
		?>
	</div>
</div>