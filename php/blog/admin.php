<?php
	include 'function.php';
	session_start();
	if (isset($_POST['user']) && isset($_POST['password']))
	{
		$db = connectToDb();
		$query = $db->prepare('SELECT uti_password, uti_nom, uti_prenom, uti_id FROM utilisateur WHERE uti_pseudo = :user');
		$query->bindValue(':user', $_POST['user'], PDO::PARAM_STR);
		$query->execute();

		if (!$query)
		{
			header('Location: register.php?wrongpass');
			exit;
		}
		$user = $query->fetch();
		if (password_verify($_POST['password'], $user['uti_password']))
		{
			echo 'hello';
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['nom'] = $user['uti_nom'];
			$_SESSION['prenom'] = $user['uti_prenom'];
			$_SESSION['id'] = $user['uti_id'];
		}
		

		
	}
	if (isset($_SESSION['user']))
	{
		$articles = getMyArticle($_SESSION['id']);
		include 'admin.phtml';
	}
	else{
		header('Location:index.php?nopass');
		exit;
	}
	
?>