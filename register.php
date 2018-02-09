<html>
	<head>
		
		<title>Home</title>
		<link href="css/main-style.css" rel="stylesheet">
		<script>
			function validate()
			{
				var name=document.getElementById("uname").value;
				var email=document.getElementById("email").value;
				var pwd=document.getElementById("pwd").value;
				var cpwd=document.getElementById("cpwd").value;
				if(name=="")
				{
					alert("Enter Usernme");
					return false;
				}
				if(email=="")
				{
					alert("Enter Email");
					return false;
				}
				else
				{
					var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
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
				if(cpwd=="")
				{
					alert("Enter Confirm Password");
					return false;
				}
				if(pwd != cpwd)
				{
					alert("Passwords Does not Match");
					return false;
				}
			}
		</script>
	</head>
	<body>
	<div class='container'>
		<?php include("mainmenu.php")?>
		
		<?php 
		if(isset($_GET['msg']))
		{
			echo "Account Created Successfully.
			Please Activate Your account";
		}
		if(isset($_GET['error']))
		{
			echo "Sorry! Somew thing Wrong";
		}
		?>
		
		
		<?php 
		include("connect.php");
		if(isset($_POST['register']))
		{
			$email=$_POST['email'];
			$pwd=md5($_POST['pwd']);
			$uname=$_POST['uname'];	
			date_default_timezone_set("Asia/Calcutta");
			$date=date("Y-m-d h:i:s");
			$ip=$_SERVER['REMOTE_ADDR'];
			
			$gender=$_POST['gender'];
			$state=$_POST['state'];
			$terms=$_POST['terms'];
			
			$query="insert into register(username,email,password,
			gender,state,terms,date_of_reg,ip)
			values('$uname','$email','$pwd','$gender',
			'$state','$terms','$date','$ip')";
			$res=mysqli_query($con,$query);
			
			if(mysqli_affected_rows($con)==1)
			{
				$id=base64_encode(mysqli_insert_id($con));
				$subject="Activation Link-Company";
				$body="Hi ".$uname.",<br><br>
				Thanks, Your account has been created successfuly
				YOur account details are:<br><br>
				Username:Your Email<br>
				Password:".$_POST['pwd']."<br><br>Please click
				the below link to acivate your account<br>
				<a target='_blank' 
				href='http://localhost:8080/9am/activate.php?uid=$id'>
				Activate Now</a>
				<br><br>Thanks<br>Company";
				$headers[]="content-type:text/html";
				$headers[]="From:GoPHP<info@gophp.in>";
				$headers[]="ReplyTo:GoPHP<info@gophp.in>";
				$headers[]="CC:Ram<ram@gophp.in>";
				$status=mail($email,$subject,$body,$headers);
				if($status)
				{
					header("Location:register.php?msg=1");
				}
				else
				{
					header("Location:register.php?error=1");
				}
			}
			else
			{
				echo mysqli_error($con);
				echo "Sorry! Unable to Create Account! Try Again";
			}
			
		}
		?>
		<div class="body-content">
		<h1>Register Here</h1>
		<form action="" method="POST" onsubmit="return validate()">
		
		<table>
			<tr>
				<td><label>Username</label></td>
				<td><Input type="text" name="uname" id="uname"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><Input type="text" name="email" id="email"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><Input type="password" name="pwd" id="pwd"></td>
			</tr>
			<tr>
				<td><label>Confirm Password</label></td>
				<td><Input type="password" name="cpwd" id="cpwd"></td>
			</tr>
			<tr>
			<td><label>Gender</label></td>
			<td>
				<Input type="radio" name="gender" value="Male" 
				id="gender"/>Male
				<Input type="radio" name="gender" value="Female" 
				id="gender"/>Female
			</td>
			</tr>
			<tr>
				<td><label>State</label></td>
				<td>
					<select name="state" id="state">
						<option value="">--state--</option>
						<option value="Telangana">Telangana</option>
						<option value="Andhrapradesh">Andhrapradesh</option>
						<option value="Maharastra">Maharastra</option>
						<option value="Uttarapradesh">Uttarapradesh</option>
						<option value="Bihar">Bihar</option>
						<option value="Punjab">Punjab</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><label><input type='checkbox' value='1' name="terms">
				Pleae accept terms and conditions</label></td>
			</tr>
			
			<tr>
				<td></td>
				<td><Input type="submit" name="register" 
				value="Register"></td>
			</tr>		
		</table>
		</form>
		</div>
	</div>
	</body>
</html>
