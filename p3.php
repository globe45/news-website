<?php 
session_start();
$n1=$_SESSION['no1'];//accessing a session
$n2=$_POST['num2'];//coming form p2
echo $n2+$n1;

echo "<br>";
echo $_COOKIE['PHPSESSID'];//prints session ID


?>