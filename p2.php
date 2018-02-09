<html>
	<head>
		<title>Session and Cookie</title>
	</head>
	<body>
<form method="POST" action="p3.php">
	Number2:<input type="text" name="num2">
	<Input type="Submit" value="Go">
</form>
	</body>
</html>

<?php 
session_start();
echo $_POST['num1'];
$_SESSION['no1']=$_POST['num1'];




//setcookie("no1",$_POST['num1']);
?>