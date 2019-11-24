<?php
	include 'function.php';
	$db = connectToDb();
	session_start();

	if (isset($_GET['id']) && !empty($_GET['id']))
	{
		$article = $db->prepare('SELECT uti_id ,art_titre, art_contenu FROM article WHERE art_id = :id');
		$article->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
		$article->execute();
		$article = $article->fetch();
		if (isset($article) && ($article['uti_id'] == $_SESSION['id'] || $_SESSION['id'] == 1))
		{
			if (isset($_POST['content']) && isset($_POST['title']))
			{
				$new_article = $db->prepare('UPDATE article SET art_titre = :title, art_contenu = :content WHERE art_id = :id');
				$new_article->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
				$new_article->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
				$new_article->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
				$new_article->execute();
				header('Location: article_modif.php?id='.$_GET['id']);
				exit;
			}
			else{
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