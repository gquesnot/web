<?php


	function connectToDb()
	{
		return (new PDO('mysql:host=localhost;dbname=blog', "root", ""));
	}


	//return all article
	function getAllArticle()
	{
		$db = connectToDb();
		$query = $db->query('SELECT uti_nom, uti_prenom, art_contenu, art_date, art_titre FROM article INNER JOIN utilisateur ON article.uti_id = utilisateur.uti_id');
		return ($query->fetchAll(PDO::FETCH_ASSOC));
	}

	function getMyArticle($uti_id)
	{
		$db = connectToDb();
		$query = $db->prepare('SELECT * FROM article WHERE uti_id = :id');
		$query->bindValue(':id', $uti_id);
		$query->execute();
		return ($query->fetchAll(PDO::FETCH_ASSOC));
	}


	function getUserDb()
	{
		$db = connectToDb();
		$query = $db->query('SELECT * FROM utilisateur');
		return ($query->fetchAll(PDO::FETCH_ASSOC));
	
	}





?>