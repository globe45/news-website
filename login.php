<?php session_start();?>
<html>
	<head>
		<title>Login Here</title>
		<link href="css/main-style.css" rel="stylesheet">
		<script>
		
			function validate()
			{
				var email=document.getElementById("email").value;
				var pwd=document.getElementById("pwd").value;
				if(email=="")
				{
					alert("Enter Email");
					return false;
				}
				else
				{
		var filter=/^([a-zA-Z0-9_\.\-])
		+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if(!filter.test(email))
					{
						alert("Enter Valid Email");
						return false;
					}
				}
				if(pwd=="")
				{
					alert("Enter Password")
					return false
				}
			}
		</script>
	</head>
	<body>
	<div class="container">
		<?php include("mainmenu.php")?>
		
		
		<?php 
			include("connect.php");
			if(isset($_POST['login']))
			{
				$email=mysqli_real_escape_string($con,$_POST['email']);
				$pwd=mysqli_real_escape_string($con,md5($_POST['pwd']));
				$result=mysqli_query($con,
				"select *from register where 
				email='$email' and password='$pwd'");
				
				if(mysqli_num_rows($result)==1)
				{
					$row=mysqli_fetch_assoc($result);
					if($row['status']==1)
					{
						$_SESSION['loggedin']=$row['id'];
						header("Location:home.php");
					}
					else
					{
						echo "Please activate your account";
					}
				}
				else{
					echo "Wrong Credentials";
				}
			}
		?>
		<div class='body-content'>
		<h1>Login Now</h1>
		<table>
			<form method="POST" action="" 
			onsubmit="return validate()">
				<tr>
					<td><label>Email</label></td>
					<td>
						<input type="text" name="email" 
						id="email">
						
					</td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="pwd"
					id="pwd"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="login"
						value="Login">
						<a href="fotgot.php">
						Forgot Password ?</a>
						</td>
				</tr>
			</form>
		</table>
		</div>
	</div>
	</body>
</html>