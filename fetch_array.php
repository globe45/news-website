<html>
	<head>
		<title>Users</title>
	</head>
	<body>
		<h2>Users</h2>
		<?php 
		$con=mysqli_connect("localhost","root",
		"","9am");
		$result=mysqli_query($con,
		"select *from users");
		if(mysqli_num_rows($result))
		{
			?>
				<table>
					<tr>
						<th>Id</th>
						<th>Username</th>
						<th>Email</th>
						<th>City</th>
						<th>Pincode</th>
					</tr>
					<?php 
					while($row=mysqli_fetch_array($result))
					{
						?>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row[1];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['city'];?></td>
							<td><?php echo $row[5];?></td>
						</tr>
						<?php
					}
					?>
				</table>
			<?php
		}
		else
		{
			echo "<p>Sorry! No Records Found</p>";
		}
		?>
	</body>
</html>