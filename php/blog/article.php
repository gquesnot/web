<?php
	include 'function.php';
	$db = connectToDb();
	session_start();
	if (isset($_POST['commentary']) && isset($_POST['pseudo']) && isset($_GET['id']))
	{
		$pseudo = $_POST['pseudo'];
		$commentary = $_POST['commentary'];
		$pseudo = strip_tags($pseudo, '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
		$commentary = strip_tags($commentary, '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>'); 
		$new_com = $db->prepare('INSERT INTO commentaire (art_id, com_pseudo, com_texte, com_datetime) VALUES (:id, :pseudo, :commentary, NOW())');
		$new_com->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
		$new_com->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
		$new_com->bindValue(':commentary',$commentary, PDO::PARAM_STR);
		$new_com->execute();
		header('Location: article.php?id='.$_GET['id']);
		exit;
	}

	if(isset($_GET['id']) && !empty($_GET['id']))
	{
	
	$article = $db->prepare('SELECT art_titre, art_contenu, art_datetime, aut_nom, aut_prenom, art_img FROM article INNER JOIN auteur ON article.aut_id = auteur.aut_id WHERE art_id = :id');
	$article->bindValue(":id", $_GET['id']);
	$article->execute();
	$article = $article->fetch();
	if($article != false)
	{
			$commentarys = $db->prepare('SELECT  com_texte, com_pseudo FROM commentaire WHERE art_id = :id');
			$commentarys->bindValue(':id', $_GET['id']);
			$commentarys->execute();
			$commentarys = $commentarys->fetchAll(PDO::FETCH_ASSOC);
			include 'header.phtml';
			include 'article.phtml';
	}
	else{
		header('Location: index.php');

	}
}
else {
	header('Location: index.php');
}


?>