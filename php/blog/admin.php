<?php
	include 'function.php';
	session_start();
	if (isset($_POST['user']) && isset($_POST['password']))
	{
		$db = connectToDb();
		$query = $db->prepare('SELECT aut_password, aut_nom, aut_prenom, aut_id FROM auteur WHERE aut_pseudo = :user');
		$query->bindValue(':user', $_POST['user'], PDO::PARAM_STR);
		$query->execute();

		if (!$query)
		{
			header('Location: register.php?wrongpass');
			exit;
		}
		$user = $query->fetch();
		if (password_verify($_POST['password'], $user['aut_password']))
		{
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['nom'] = $user['aut_nom'];
			$_SESSION['prenom'] = $user['aut_prenom'];
			$_SESSION['id'] = $user['aut_id'];
		}
		if (isAdmin($_SESSION['id']))
		{
			$_SESSION['admin'] = 1;
		}
		
	}
	if (isset($_SESSION['user']))
	{
		if (isset($_SESSION['admin']))
		{	
			$articles = getAllArticle();
		}
		else
			$articles = getMyArticle($_SESSION['id']);
	
		include 'header.phtml';
		include 'admin.phtml';
	}
	else{
		header('Location:index.php?nopass');
		exit;
	}
	
?>