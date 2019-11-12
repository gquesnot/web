<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<?php 
		$tab = [];
		$i = 0;
		while ($i< 6)
		{
			
			$random = random_int(1, 49);
			while (in_array($random,$tab))
			{
				$random =random_int(1, 49);
			}
			$tab[] = $random;
			$i++;
		}

		sort($tab);
		echo '<table><thead><tr><th>index</th><th>nombre lotterie</th></tr></thead><tbody>';
		for ($i = 0; $i < 6; $i++)
		{
			echo '<tr><th>' . ($i + 1) . '</th>';

			echo '<td>' . $tab[$i] . '</td></tr>';

		}
		echo '</tbody></table>';

		?>

</body>
</html>