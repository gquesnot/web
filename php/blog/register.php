<?php

include 'function.php';

if(isset($_POST['user']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']))
{

	$users = getUserDb();
	$set = true;
	foreach ($users as $user) {
		if ($user['uti_pseudo'] == $_POST['user'] || password_verify($_POST['password'], $user['uti_password']))
			$set = false;
	}
	if ($set == true)
	{
		$db = connectToDb();
		$query = $db->prepare('INSERT INTO utilisateur (uti_pseudo, uti_nom, uti_prenom, uti_email, uti_password) VALUES (:user, :nom, :prenom, :email, :password);');
		$options = ['cost' => 11];
		$query->bindValue(":user", $_POST['user'], PDO::PARAM_STR);
		$query->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
		$query->bindValue(":prenom", $_POST['prenom'], PDO::PARAM_STR);
		$query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
		$query->bindValue(":password",password_hash($_POST['password'], PASSWORD_BCRYPT, $options), PDO::PARAM_STR);
		$query->execute();
		
		echo "registred";
	}
	else{
		echo "user or password already used";
	}

}
else{
		echo "enregistrer vous ou info incomplete";
	}




include 'register.phtml';
?>