<!DOCTYPE html>
<html>
<head>

	<title></title>

	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<?php
echo '<table><thead><tr><th></th>';
$i = 1;
$j = 1;
while ($i <= 10)
{
	echo '<th>'.$i.'</th>';
	$i++;
}
echo '</tr></thead><tbody>';
$i=1;
while ($j <= 10)
{	
	echo '<tr><th>'.$j.'</th>';
	while($i <= 10)
	{
		if ($i == $j)
		{
			echo '<td class="yellow">'.$i*$j.'</td>';
		}
		else
			echo '<td>'.$i*$j.'</td>';

		$i++;
	}
	$i=1;
	$j++;
	echo '</tr>';
}
echo '</tbody></table>';

?>


</body>
</html>