<html>
	<head>
		<title>Users</title>
	</head>
	<body>
		<h1>Users</h1>
		<?php 
		$con=mysqli_connect("localhost",
		"root","","9am");
		$sql="select *from users";
		$result=mysqli_query($con,$sql);
		$num=mysqli_num_rows($result);
		echo "<table border=1>";
		echo "<tr>
				<th>ID</th>
				<th>Name</th>
				<th>EMail</th>
				<th>Password</th>
				<th>City</th>
				<th>Pincode</th>
			</tr>";
		for($i=0;$i<$num;$i++)
		{
			$row=mysqli_fetch_row($result);
			echo "<tr>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
				<td>$row[4]</td>
				<td>$row[5]</td>
			</tr>";
		}
		
		?>
		
	</body>
</html>