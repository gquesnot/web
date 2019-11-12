

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

	function lre($string)
{
	$i = 0;
	$char = $string[0];
	$final_string = "";
	$len = strlen($string);
	while ($string[$i])
	{
		if ($i == $len-1)
		{
			$final_string = $final_string ."". ($i+1) ."". $char;
			break;

		}
		else if ($string[$i+1] != $char)
		{
			$string = substr($string, $i+1);
			$final_string = $final_string ."". ($i+1) ."". $char;
			$i = 0; 
			$len = strlen($string);
			$char = $string[0];
		}
		else
			$i++;
	}
	return ($final_string);
}


echo lre("WWWWWWWWWWWWBWWWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWBWWWWWWWWWWW");
?>
</body>
</html>


