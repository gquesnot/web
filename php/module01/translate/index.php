<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	 if(isset($_GET['mot']))
	{$var1= $_GET['mot'];}
	else
		$var1 = "";
	?>
	<h1>TRADUCTEUR anglais francais</h1>
	<form action="translate.php" method="get"> 
		<input type="text" name="mot" value="<?php echo $var1 ?>"/>
		<select name="langue" size="1">
<option>francais->anglais</option>
<option>anglais->francais</option>

</select>
<input type="submit" value="traduire">



	</form>
<?php  
	if (isset($_GET['reponse']) && !empty($_GET['reponse']))
	{?>
	<h3>La traduction est <?php echo $_GET['reponse']; ?></h3>
	<?php  }
	else if (isset($_GET['reponse']) && $_GET['reponse'] === "")
	{?>
		<h3> Aucune traduction trouvée<h3>

		<?php
	}
?>
</body>
</html>