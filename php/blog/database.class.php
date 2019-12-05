<?php
	include_once 'class.php';
	class Database
	{
	// pour stocker la connexion à la BDD
	private $pdo;

	// quand on instancie la classe on ouvre la connexion à la BDD
	public function __construct()
	{
		$this->pdo = new PDO('mysql:host=localhost;dbname=classicmodels', 'root','troiswa');

		$this->pdo->exec('SET NAMES UTF8');
	}

	// exécuter une requête de type INSERT avec comme retour le dernier ID inséré
	public function executeSql($sql, array $values = array())
	{
		$query = $this->pdo->prepare($sql);

		$query->execute($values);

		return $this->pdo->lastInsertId();
	}

	// exécuter une requête qui retourne plusieurs résultats (fetchAll)
    public function query($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

	// exécuter une requête qui retourne un seul résultat (fetch)
    public function queryOne($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}