<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$f = fopen("compteur", "r+");
		$data = intval(fgets($f));
		$data++;
		rewind($f);
		fwrite($f, $data);
		echo "Vous avez eu ".$data." visiteurs sur votre site";


	?>

</body>
</html>