<?php 
//echo mail("rambabburi@gmail.com","Activation LInk","HI Rama,How r u?");
$to="rambabburi@gmail,info@gophp.in";
$subject="Activation Link";

$message="Hi Ram,<br><br>Thanks for registring with us
You account has been created successfully
Your detaisl are:<br>
username:yourmail<br>Password:123456<br>
TO get Access with our website please activate your 
accounr now<br><br><a href=''>Activate Now</a><br><br>
Thanks<br>
our Team";

$mail_headers="Content-type:text/html".'\r\n'.
				"From: GoPHP <info@gophp.in>".'\r\n'.
				"cc:GoPHP <info@gophp.in>".'\r\n'.
				"reply-to:GoPHP <info@gophp.in>";




mail($to,$subject,$message,$mail_headers);

?>