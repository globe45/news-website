<?php

if(!file_exists("files"))
{
	mkdir("files");
}
for($i=0;$i<(random_int(0,12));$i++)
{
	file_put_contents("files/document$i.txt","This is Text Document".$i."");

}
for($i=0;$i<(random_int(0,12));$i++)
{
	
	file_put_contents("files/document$i.php","This is PHP Document".$i."");
	
}
for($i=0;$i<(random_int(0,12));$i++)
{
	
	file_put_contents("files/document$i.html","This is HTML Document".$i."");
	;
}
for($i=0;$i<(random_int(0,12));$i++)
{
	
	file_put_contents("files/document$i.jpg","");
}
$fp = opendir("files");
$i=0;
$arr=array();$count_php = $count_txt = $count_img = $count_html = 0;
$types=array("html","php","jpg");
while($fname=readdir($fp))
{
	if(!($fname=="."||$fname==".."))
		{
			
			$arr[$i]= strrev($fname);
			$first = explode(".",$arr[$i]);
			$arr[$i]=$first[0];
            $arr[$i]= strrev($arr[$i]);
			
            if(in_array($arr[$i],$types))
			{
				$count_html++;
		    }
              else if($arr[$i]=="txt" )
			  {
				  $count_txt++;
			  }				  
			  else if($arr[$i]=="jpg"|| $arr[$i]=="png" || $arr[$i]=="gif")
			  {
			       $count_img++;
			  }
				  else
					  $count_php++;
					  
			$i++;
		}
		
		
		
		

	}
	echo ("no. of html files :-".$count_html);
		 echo"<br>";
		echo ("no. of image files :-".$count_img);
		echo "<br>";
		echo ("no. of text files :-".$count_txt);
		echo "<br>";
		echo ("no. of php files :-".$count_php);
	
/*	
echo "<pre>";
	print_r($arr);

*/



/*


//echo file_get_contents("ankit.php.txt.jpg.png.txt");
/*$fp = fopen("php_file/file.txt","r");
while(!feof($fp))
{
	echo fgets($fp)."<br>";
}

echo fclose($fp);*/
?>