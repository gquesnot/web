<?php
 	include 'function.php';
		session_start();
		$db = connectToDb();
		if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['auteur']))
		{
			var_dump($_FILES['img']);
		
			if ($_POST['auteur'] == $_SESSION['id'] || isset($_SESSION['admin'])) // || admin 
			{
				$img_src = "";
				$title = $_POST['title'];
				$content = $_POST['content'];
				$title = strip_tags($title, '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
				var_dump($title);
				$query = $db->prepare('SELECT art_id FROM article WHERE art_titre = :title');
				$query->bindValue(":title", $title, PDO::PARAM_STR);
				$query->execute();
				$res= $query->fetch();
				if ($res == false)
				{
				if ($_FILES['img']['name'] != '')
				{
					
				$target_file = "img/".basename($_FILES['img']['name']);
				$imageFileType = strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION));
			 	$check = getimagesize($_FILES["img"]["tmp_name"]);
			 	$target_file = "img/".uniqid().".".$imageFileType;
			 	if ($check != false)
			 	{
			 			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif")
			 			{
			 				move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
			 				$img_src = $target_file;
			 			}
			 	}
			 }
			 
			 	$content = strip_tags($content, '<h1><h2><h3><h4><br><ul><li><style><strong><em><del><sub><p><hr><blockquote>');
			 	var_dump($content);
				$query = $db->prepare('INSERT INTO article(aut_id, art_img, art_titre, art_contenu, cat_id, art_datetime) VALUES(:id, :img, :title, :content, :category ,NOW())');
				$query->bindValue(":id", $_POST['auteur'], PDO::PARAM_STR);
				$query->bindValue(":img", $img_src, PDO::PARAM_STR);
				$query->bindValue(":title", $title, PDO::PARAM_STR);
				$query->bindValue(":content", $content, PDO::PARAM_STR);
				$query->bindValue(":category", $_POST['category'], PDO::PARAM_STR);
				$query->execute();
				$query = $db->prepare('SELECT art_id FROM article WHERE art_titre = :title');
				$query->bindValue(":title", $title, PDO::PARAM_STR);

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
		if (isset($_SESSION['admin']))
		{
			$users = $db->prepare('SELECT aut_id, aut_nom, aut_prenom FROM auteur WHERE aut_id != :id');
			$users->bindValue(":id",$_SESSION['id']);
			$users->execute();
			$users = $users->fetchAll(PDO::FETCH_ASSOC);
		}
		$categorys = $db->prepare('SELECT * FROM categorie'); 
		$categorys->execute();
		$categorys = $categorys->fetchAll(PDO::FETCH_ASSOC);


	include 'header.phtml';
	include 'article_new.phtml';
?>