<html>
	<head>
		<title>File Uploading</title>
	</head>
	<body>
		<h1>File Uploading</h1>
		
		<form method="POST" action="" 
		enctype="multipart/form-data">

			<label>UPload Profile</label><br>
			<input type="file" name="image"><br><br>
			<input type="submit" name="submit" value="Save">
		</form>
		<?php 
		if(isset($_POST['submit']))
		{
			$fname=$_FILES['image']['name'];
			$fsize=$_FILES['image']['size'];
			$ftype=$_FILES['image']['type'];
			$tmp=$_FILES['image']['tmp_name'];
				
		$arr=array("image/jpeg","image/png",
		"image/gif","image/jpg");
		
		$str=str_shuffle("123456780abcdefghijkn
		lmopqrstuvwyxz");
		$key=substr($str,20,30);
		$array=explode("/",$ftype);
		$ext=$array[1];
		$filename=$key."_".time().".".$ext;
		
		if(in_array($ftype,$arr))
		{
			if($fsize < 1000000)
			{
				$status=move_uploaded_file($tmp,
				"uploads/$filename");
				if($status)
				{
					echo "File Uploded Successfully";
				}
				else
				{
					echo "Sorry Unable TOUpload";
				}
			}
			else
			{
				echo "FIle Size is Exceded(filesize:1mb below)";
			}
		}
		else
		{
			echo "Please select a Valid Image";
		}
		
			
		}
		?>
	</body>
</html>