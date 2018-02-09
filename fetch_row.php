<html>
	<head>
		<title>Users</title>
	</head>
	<body>
		<h1>Users</h1>
		<?php 
		$con=mysqli_connect("localhost",
		"root","","9am");
		$result=mysqli_query($con,
		"select *from users");
		if(mysqli_num_rows($result))
		{
			?>
			<center>
				<table>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>City</th>
						<th>Pincode</th>
					</tr>
				<?php
					$num=mysqli_num_rows($result);
					for($i=0;$i<$num;$i++)
					{
						$row=mysqli_fetch_row($result);
						?>
							<tr>
								<td><?php echo $row[0]; ?></td>
								<td><?php echo $row[1]; ?></td>
								<td><?php echo $row[2]; ?></td>
								<td><?php echo $row[4]; ?></td>
								<td><?php echo $row[5]; ?></td>
							</tr>
						<?php
					}
				?>
				</table>
				</center>
			<?php
		}
		else
		{
			echo "Soory No records FOund";
		}
		?>
		
	</body>
</html>