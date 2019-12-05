<?php

include 'function.php';

if (isset($_GET['id']))
{
	session_start();
	$db= connectToDb();
	$query = $db->prepare('SELECT aut_id , article.art_id FROM article INNER JOIN commentaire ON article.art_id = commentaire.art_id WHERE com_id = :id');
	$query->bindValue(':id', $_GET['id'],PDO::PARAM_INT);
	$query->execute();
	$query = $query->fetch();
	if ($query != false && ($query['aut_id'] == $_SESSION['id'] || isset($_SESSION['admin'])))
	{
		$del = $db->prepare('DELETE FROM commentaire WHERE com_id = :id');
		$del->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
		$del->execute();
		header('Location: article_modif.php?id='.$query['art_id']);
	}
	else{
		header('Location: admin.php');
	}
}