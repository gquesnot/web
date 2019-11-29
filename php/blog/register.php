<?php

include 'function.php';

if(isset($_POST['user']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']))
{

	$users = getUserDb();
	$set = true;
	foreach ($users as $user) {
		if ($user['aut_pseudo'] == $_POST['user'] || $_POST['email'] ==  $user['aut_email'])
			$set = false;
	}
	if ($set == true)
	{
		$_POST['user'] = strip_tags($_POST['user'], '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
		$_POST['nom'] = strip_tags($_POST['nom'], '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
		$_POST['prenom'] = strip_tags($_POST['prenom'], '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
		$_POST['email'] = strip_tags($_POST['email'], '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
		$db = connectToDb();
		$query = $db->prepare('INSERT INTO auteur (aut_pseudo, aut_nom, aut_prenom, aut_email, aut_password) VALUES (:user, :nom, :prenom, :email, :password);');
		$options = ['cost' => 11];
		$query->bindValue(":user", $_POST['user'], PDO::PARAM_STR);
		$query->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
		$query->bindValue(":prenom", $_POST['prenom'], PDO::PARAM_STR);
		$query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
		$query->bindValue(":password",password_hash($_POST['password'], PASSWORD_BCRYPT, $options), PDO::PARAM_STR);
		$query->execute();
		
		header('Location: index.php');
	}
	else{
		echo "user or password already used";
	}

}
else{
		echo "enregistrer vous ou info incomplete";
	}



include 'header.phtml';
include 'register.phtml';
?>