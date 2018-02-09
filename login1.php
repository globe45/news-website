<html>
	<head>
		<title>Login Here</title>
		<script>
		
			function validate()
			{
				var email=document.getElementById("email").value;
				var pwd=document.getElementById("pwd").value;
				if(email=="")
				{
					var elem=document.getElementById("email_error");
					elem.innerHTML="Enter Email";
					elem.style.color="red";
					elem.style.fontSize="10"
					return false;
				}
				else
				{
					var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if(!filter.test(email))
					{
					var elem=document.getElementById("email_error");
					elem.innerHTML="Enter Valid Email";
					elem.style.color="red";
					elem.style.fontSize="10"
					return false;
					}
				}
				if(pwd=="")
				{
					var elem=document.getElementById("pwd_error");
					elem.innerHTML="Enter Password";
					elem.style.color="red";
					elem.style.fontSize="10"
					return false;
				}
			}
			
			function checkValue(t)
			{
				if(t.value!="")
				{
					var elem=document.getElementById(t.id+"_error");
					elem.innerHTML="";
				}
			}
		</script>
	</head>
	<body>
		<h1>Login Now</h1>
		<table>
			<form method="POST" action="" onsubmit="return validate()">
				<tr>
					<td><label>Email</label></td>
					<td>
						<input type="text" onblur="checkValue(this)" name="email" id="email">
						<span id="email_error"></span>
					</td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td>
						<input onblur="checkValue(this)"  type="password" name="pwd" id="pwd">
						<span id="pwd_error"></span>
						</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="login" value="Login">
						<a href="fotgot.php">Forgot Password ?</a>
						</td>
				</tr>
			</form>
		</table>
	</body>
</html>