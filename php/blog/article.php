<?php
	include 'function.php';
	$db = connectToDb();
	session_start();
	if (isset($_POST['commentary']) && isset($_POST['pseudo']) && isset($_GET['id']))
	{
		$new_com = $db->prepare('INSERT INTO commentaire (art_id, com_pseudo, com_contenu, com_date) VALUES (:id, :pseudo, :commentary, NOW())');
		$new_com->bindValue(':id',$_GET['id'], PDO::PARAM_INT);
		$new_com->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
		$new_com->bindValue(':commentary',$_POST['commentary'], PDO::PARAM_STR);
		$new_com->execute();
		header('Location: article.php?id='.$_GET['id']);
		exit;
	}

	if(isset($_GET['id']) && !empty($_GET['id']))
	{
	
	$article = $db->prepare('SELECT art_titre, art_contenu, art_date, uti_nom, uti_prenom FROM article INNER JOIN utilisateur ON article.uti_id = utilisateur.uti_id WHERE art_id = :id');
	$article->bindValue(":id", $_GET['id']);
	$article->execute();
	$article = $article->fetch();
	if($article != false)
	{
			$commentarys = $db->prepare('SELECT  com_contenu, com_pseudo FROM commentaire WHERE art_id = :id');
			$commentarys->bindValue(':id', $_GET['id']);
			$commentarys->execute();
			$commentarys = $commentarys->fetchAll(PDO::FETCH_ASSOC);
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