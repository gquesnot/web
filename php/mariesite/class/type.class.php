<?php

class Type{
	
	use Hydrate;
	private $id;
	private $name;

	public function setId($id) { $this->id = $id; }
	public function getId() { return $this->id; }
	public function setName($name) { $this->name = $name; }
	public function getName() { return $this->name; }


	public static function getAllType()
	{
		$db = new Database();
		$datas = $db->query('SELECT * FROM type');
		$array = array();
		foreach($datas as $data)
		{
			$tmp = new Type();
			$tmp->hydrate($data);
			$array[] = $tmp;
		}
		return $array;
	}

	public static function getOneType($id)
	{
		$db = new Database();
		$data = $db->queryOne('SELECT * FROM type WHERE id=?',array($id));
		$tmp = new Type();
		$tmp->hydrate($data);
		return $tmp;		
	}

	public static function getOneTypeByName($name)
	{
		$db = new Database();
		$data = $db->queryOne('SELECT * FROM type WHERE name=?',array($name));
		return $data['id'];		
	}
}