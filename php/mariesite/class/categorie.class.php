<?php

class Categorie{
	
	use Hydrate;
	private $id;
	private $name;

	public function setId($id) { $this->id = $id; }
	public function getId() { return $this->id; }
	public function setName($name) { $this->name = $name; }
	public function getName() { return $this->name; }


	public static function getAllCategorie()
	{
		$db = new Database();
		$datas = $db->query('SELECT * FROM categorie');
		$array = array();
		foreach($datas as $data)
		{
			$tmp = new Categorie();
			$tmp->hydrate($data);
			$array[] = $tmp;
		}
		return $array;
	}

	public static function getOneCategorie($id)
	{
		$db = new Database();
		$data = $db->queryOne('SELECT * FROM categorie WHERE id=?',array($id));
		$tmp = new Categorie();
		$tmp->hydrate($data);
		return $tmp;		
	}
	public static function getOneCategorieByName($name)
	{
		$db = new Database();
		$data = $db->queryOne('SELECT * FROM categorie WHERE name=?',array($name));
		var_dump($data['id']);
		return $data['id'];		
	}

}