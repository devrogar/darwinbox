<!DOCTYPE html>
<html lang="en">
<head>
	<title>String Compression</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="shortcut icon" href="favicon.ico">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<center><h1>String Compression using pure PHP</h1></center>
<div class="container-fluid" style="margin-top:60px;width:50%;border:2px solid black;text-align:center">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="text" name="string" placeholder="Enter a string" style="margin-top:20px">
<button type="submit" style="margin-top:20px">Compress</button>
</form>
<div style="margin-top:20px">
<?php
if(isset($_POST['string']) && @$_POST['string']!=NULL)
{
	echo "received '".$_POST['string'] . "'<br>";
	$string = trim($_POST['string']);
	$arr = str_split($string);
	$len = strlen($string);
	var_dump($arr);
	if($len <=2)
	{
		echo "String length normal. Not compressing!";
	}
	else
	{
		$count = 0;
		$char = 0;
		$op = "";
		$i=0;
		while($i<$len-1)
		{
			if($arr[$i]==$arr[$i+1])
			{
				$count++;
			}
			else
			{
				if($count>=2)
				{
					$op .= $count+1 . "@" . $arr[$i];
					$count = 0;
				}
				else
				{
					if($count==1){
					$op .= $arr[$i-1] . $arr[$i];
					$count = 0;}
					else{
					$op .=  $arr[$i];
					}
				}
			}
			
			$i++;
		}
		if($count>=2)
		{
			$op .= $count+1 . "@" . $arr[$i];
		}
		else
		{
			$op .= $arr[$i-1] . $arr[$i];
		}
		echo "Compressed string " . $op;
	}
	
}
else
{
	echo "<p>enter a valid string</p><br>";
}
?>
</div>
</div>
</body>
</html>