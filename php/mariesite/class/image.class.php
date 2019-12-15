<?php
	class Image{

	use Hydrate;
	
	private $id;
	private $source;
	private $description;
	private $name;
	private $cat_id;
	private $type_id;
	private $addedTimestamp;
	private $categorie;
	private $type;
	private $fhdSrc;
	private $hdSrc;
	private $lowSrc;





	public function setId($id) { $this->id = $id; }
	public function getId() { return $this->id; }
	public function setSource($source) { $this->source = $source; }
	public function getSource() { return $this->source; }
	public function setDescription($description) { $this->description = $description; }
	public function getDescription() { return $this->description; }
	public function setName($name) { $this->name = $name; }
	public function getName() { return $this->name; }
	public function setCat_id($cat_id) { $this->cat_id = $cat_id; }
	public function getCat_id() { return $this->cat_id; }
	public function setType_id($type_id) { $this->type_id = $type_id; }
	public function getType_id() { return $this->type_id; }
	public function setAddedTimestamp($addedTimestamp) { $this->addedTimestamp = $addedTimestamp; }
	public function getAddedTimestamp() { return $this->addedTimestamp; }
	public function setFhdSrc($fhdSrc) { $this->fhdSrc = $fhdSrc; }
	public function getFhdSrc() { return $this->fhdSrc; }
	public function setHdSrc($hdSrc) { $this->hdSrc = $hdSrc; }
	public function getHdSrc() { return $this->hdSrc; }
	public function setLowSrc($lowSrc) { $this->lowSrc = $lowSrc; }
	public function getLowSrc() { return $this->lowSrc; }

	public function setCategorie($categorie) { $this->categorie = $categorie; }
	public function getCategorie() { return $this->categorie; }
	public function setType($type) { $this->type = $type; }
	public function getType() { return $this->type; }

 	public static function getAllPhoto()
 	{
 		$db = new Database();
 		$datas = $db->query("SELECT * FROM  image INNER JOIN type ON image.type_id=  type.id WHERE type.id = 1");
 		$array = array();
 		foreach ($datas as $data)
 		{
 			$tmp = new Image();
 			$tmp->hydrate($datas);
 			$tmp->setCategorie($tmp->getCat_id());
 			$tmp->setType($tmp->getType_id());
 			$array[] = $tmp;
 		}
 		return $array;
 	}	


 	public static function getAllPaint()
 	{
 		$db = new Database();
 		$datas = $db->query("SELECT * FROM  image INNER JOIN type ON image.type_id=  type.id WHERE type.id = 2");
 		$array = array();
 		foreach ($datas as $data)
 		{
 			$tmp = new Image();
 			$tmp->hydrate($datas);
 			$tmp->setCategorie($tmp->getCat_id());
 			$tmp->setType($tmp->getType_id());
 			$array[] = $tmp;
 		}
 		return $array;
 	}

 	public static function getOneImageById($id)
 	{
 		$db = new Database();
 		$data = $db->queryOne("SELECT * FROM  image WHERE id = ?", array($id));
 		$tmp = new Image();
 		$tmp->hydrate($data);
 		$tmp->setCategorie($tmp->getCat_id());
 		$tmp->setType($tmp->getType_id());

 		return $tmp;
 	}

 	public static function getAllPaintByCat($cat_id)
 	{
 		$db = new Database();
 		$datas = $db->query("SELECT * FROM  image INNER JOIN type ON image.type_id=  type.id INNER JOIN categorie ON image.cat_id = categorie.id WHERE type.id = 2 AND categorie.id = ?", array($cat_id));
 		$array = array();
 		foreach ($datas as $data)
 		{
 			$tmp = new Image();
 			$tmp->hydrate($datas);
 			$tmp->setCategorie($tmp->getCat_id());
 			$tmp->setType($tmp->getType_id());
 			$array[] = $tmp;
 		}
 		return $array;
 	}

 	public static function getAllPhotoByCat($cat_id)
 	{
 		$db = new Database();
 		$datas = $db->query("SELECT * FROM  image INNER JOIN type ON image.type_id=  type.id INNER JOIN categorie ON image.cat_id = categorie.id WHERE type.id = 1 AND categorie.id = ?", array($cat_id));
 		$array = array();
 		foreach ($datas as $data)
 		{
 			$tmp = new Image();
 			$tmp->hydrate($datas);
 			$tmp->setCategorie($tmp->getCat_id());
 			$tmp->setType($tmp->getType_id());
 			$array[] = $tmp;
 		}
 		return $array;
 	}

 	public static function insertImage($description, $nom, $source, $fhdSrc, $hdSrc, $lowSrc, $cat_id, $type_id)
 	{
 		$db = new Database();
 		$data =$db->executeSql("INSERT INTO image (`description`, `name`, `source`, `fhdSrc`, `hdSrc`, `lowSrc`, `cat_id`, `type_id`, `addedTimestamp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?,NOW())", array($description, $nom, $source, $fhdSrc, $hdSrc, $lowSrc, $cat_id, $type_id));
 		return $data;
 	}

}