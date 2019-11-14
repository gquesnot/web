<?php
	$tab = ["Janvier","Fevrier","Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];

	$title = $_POST['titre'];
	$task = $_POST['tache'];
	$day = $_POST['date_jour'];
	$month = $_POST['date_mois'];
	$year= $_POST['date_anne'];
	$priorite = $_POST['priorite'];
	$f = fopen("db.csv", "a");
	$date = $day."-".array_search($month, $tab)."-".$year;
	$array = [$title, $task, $date, $priorite];
	fputcsv($f, $array);
	fclose($f);
	header('location:index.php');
?>