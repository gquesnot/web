<?php
	include 'function.php';

	session_start();
	$db = connectToDb();
	if (isset($_GET['id']) && !empty($_GET['id']))
	{
		$article = $db->prepare('SELECT aut_id FROM article WHERE art_id = :id');
		$article->bindValue(':id', $_GET['id']);
		$article->execute();
		$article = $article->fetch();
		if (!empty($article) && ($article['aut_id'] == $_SESSION['id'] || isset($_SESSION['admin'])))
		{
			$del_art = $db->prepare('DELETE FROM article WHERE art_id = :id');
			$del_art->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
			$del_art->execute();
			$del_com = $db->prepare('DELETE FROM commentaire WHERE art_id = :id');
			$del_com->bindValue(':id', $_GET['id'] , PDO::PARAM_INT);
			$del_com->execute();
			header('Location: admin.php');
			exit;
		}
	}
		header('Location: index.php');
	
?>