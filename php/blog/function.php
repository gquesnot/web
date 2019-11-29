<?php


	function connectToDb()
	{
		$tmp = new PDO('mysql:host=localhost;dbname=blog1', "root", "troiswa");
		$tmp->exec('SET NAMES UTF8');

		return ($tmp);
	}


	//return all article
	function getAllArticle()
	{
		$db = connectToDb();
		$query = $db->query('SELECT art_id , aut_nom, aut_prenom, cat_nom, art_datetime, art_titre, art_contenu FROM article INNER JOIN auteur ON article.aut_id = auteur.aut_id INNER JOIN categorie ON article.cat_id = categorie.cat_id ORDER BY art_datetime DESC');
		return ($query->fetchAll(PDO::FETCH_ASSOC));
	}

	function getMyArticle($aut_id)
	{
		$db = connectToDb();
		$query = $db->prepare('SELECT art_id, art_titre, art_contenu, aut_nom, aut_prenom,cat_nom FROM article INNER JOIN categorie ON article.cat_id = categorie.cat_id  INNER JOIN auteur ON auteur.aut_id = article.aut_id WHERE auteur.aut_id = :id ORDER BY art_datetime DESC' );
		$query->bindValue(':id', $aut_id);
		$query->execute();
		return ($query->fetchAll(PDO::FETCH_ASSOC));
	}


	function getUserDb()
	{
		$db = connectToDb();
		$query = $db->query('SELECT aut_pseudo, aut_email FROM auteur');
		return ($query->fetchAll(PDO::FETCH_ASSOC));
	
	}

	function isAdmin($aut_id)
	{
		$db = connectToDb();
		$query = $db->prepare('SELECT admin_id FROM admin WHERE aut_id = :id');
		$query->bindValue(":id", $aut_id);
		$query->execute();
		$query = $query->fetchAll(PDO::FETCH_ASSOC);
		if ($query != null)
			return (true);
		else
			return (false);
	}






?>