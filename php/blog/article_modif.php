<?php
	include 'function.php';
	$db = connectToDb();
	session_start();

	if (isset($_GET['id']) && !empty($_GET['id']))
	{
		$article = $db->prepare('SELECT aut_id ,art_titre, art_contenu FROM article WHERE art_id = :id');
		$article->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
		$article->execute();
		$article = $article->fetch();
		if (isset($article) && ($article['aut_id'] == $_SESSION['id'] || isset($_SESSION['admin'])))
		{
			if (isset($_POST['content']) && isset($_POST['title']))
			{
				$_POST['title'] = strip_tags($_POST['title'], '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
				$_POST['content'] = strip_tags($_POST['content'], '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
				$new_article = $db->prepare('UPDATE article SET art_titre = :title, art_contenu = :content WHERE art_id = :id');
				$new_article->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
				$new_article->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
				$new_article->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
				$new_article->execute();
				header('Location: article_modif.php?id='.$_GET['id']);
				exit;
			}
			else{
				include 'header.phtml';
				include 'article_modif.phtml';
			}
			
		}
		else{
			header('Location: index.php');
			exit;
		}
	}
	else{
		header('Location: index.php');
		exit;
	}
?>