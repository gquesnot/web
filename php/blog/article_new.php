<?php
	include 'function.php';

		session_start();
		if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['auteur']))
		{

			if ($_POST['auteur'] == $_SESSION['id'] || $_SESSION['id'] == 1) // || admin 
			{
				$db = connectToDb();
				$query = $db->prepare('SELECT art_id FROM article WHERE art_titre = :title');
				$query->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
				$query->execute();
				$res= $query->fetch();
				if ($res == false)
				{
				$query = $db->prepare('INSERT INTO article(uti_id, art_image, art_titre, art_contenu, art_date) VALUES(:id, "image", :title, :content, NOW())');
				$query->bindValue(":id", $_POST['auteur'], PDO::PARAM_STR);
				$query->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
				$query->bindValue(":content", $_POST['content'], PDO::PARAM_STR);
				$query->execute();
				$query = $db->prepare('SELECT art_id FROM article WHERE art_titre = :title');
				$query->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
				$query->execute();
				$article = $query->fetch();	
				header('Location: article.php?id='.$article['art_id']);
			}
			echo "article already exist";
			}
			else{
				
				echo "bad";
			}

		}
		if ($_SESSION['id'] == 1)
		{
			$db = connectToDb();
			$users = $db->prepare('SELECT uti_id, uti_nom, uti_prenom FROM utilisateur WHERE uti_id != :id');
			$users->bindValue(":id",1);
			$users->execute();
			$users = $users->fetchAll(PDO::FETCH_ASSOC); 
		}


	include 'article_new.phtml';
?>