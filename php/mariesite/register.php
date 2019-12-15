<?php
	session_start();
	include 'class.php';

	if (isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom']))
	{
		$db = new Database();
		$data = $db->queryOne('SELECT id FROM utilisateur WHERE uti_email = ?', array($_POST['email']));
		if ($data == false)
		{
			$options = ['cost' => 12];
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
			$db->executeSql('INSERT INTO utilisateur (uti_pseudo, uti_nom, uti_prenom, uti_password, uti_email, creationTimestamp) VALUES (?, ?, ?, ?, ?, NOW())', array($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $password, $_POST['email'],));
			header('Location: login.php');
			exit;
		}
		else{
			$erreur = "email deja utilisé";
		}

	}




	include 'header.phtml';
	include 'register.phtml';
	include 'footer.phtml';

