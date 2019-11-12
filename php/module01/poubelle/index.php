<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		echo 'page etc php';

		var_dump('caribou');
		$object = ['metier'=>['nom'=>'prog','temps' => '3ans'], 'nom'=> 'mairou'];
		echo $object['metier']['nom']." " .$object['metier']['temps']."    ".$object['nom'];


	?>


</body>
</html>