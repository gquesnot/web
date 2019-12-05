<?php
	include 'function.php';

 if (isset($_POST['com_pseudo']) && isset($_POST['com_content']) && isset($_GET['id']))
 {
 	session_start();
 	$db = connectToDb();

 	$query = $db->prepare('SELECT aut_id, article.art_id FROM article INNER JOIN commentaire ON article.art_id = commentaire.art_id WHERE com_id = :id');
 	$query->bindValue('id', $_GET['id']);
 	$query->execute();
 	$query = $query->fetch();
 	if ($query!= false && ($query['aut_id'] == $_SESSION['id'] || isset($_SESSION['admin'])))
 	{
 		$modif = $db->prepare('UPDATE commentaire SET com_pseudo = :pseudo, com_texte = :content WHERE com_id = :id');
 		$modif->bindValue(':pseudo', $_POST['com_pseudo'], PDO::PARAM_STR);
 		$modif->bindValue(':content', $_POST['com_content'], PDO::PARAM_STR);
 		$modif->bindValue(':id', $_GET['id'],PDO::PARAM_INT); 
 		$modif->execute();
 		header('Location: article_modif.php?id='.$query['art_id']);
 	}
 	else
 	{
 		header('Location: admin.php');
 	}

 }
