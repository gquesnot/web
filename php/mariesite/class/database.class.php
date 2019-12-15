<?php


class Database
{
	private $pdo;


	public function __construct()
	{

		$this->pdo = new PDO
		(	//dsn
			"mysql:host=localhost;dbname=inspiredby",
			//login
			"root",
			//pass
			""
		);

		$this->pdo->exec('SET NAMES UTF8');
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	/*$this->pdo->setAttribute(PDO::ATTR_E MULATE_PREPARES, false);*/
	
    }
	public function executeSql($sql, array $values = array())
	{
		$query = $this->pdo->prepare($sql);

		$query->execute($values);

		return $this->pdo->lastInsertId();
	}

    public function query($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, array $criteria = array())
    {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}