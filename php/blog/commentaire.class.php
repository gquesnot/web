<?php
include_once 'class.php';
class Commentaire{
		private $com_id;
		private $art_id;
		private $com_pseudo;
		private $com_texte;
		private $com_datetime;



	public function __construct(){

	}
	public function __call($method, $args) {
        echo '<br><strong>La méthode '.$method.' n\'existe pas ou n\'est pas accessible</strong><br>';
    }
    public function __get($prop) {
        echo '<br><strong>La propriété '.$prop.' n\'existe pas ou n\'est pas accessible</strong><br>';
    }
    public function __set($prop, $val) {
        echo '<br><strong>La propriété '.$prop.' n\'existe pas ou n\'est pas disponible</strong><br>';
    }
    public function __toString() {
        return '<h1>Article en cours : '.$this->art_titre.'</h2>';
    }

    //setters
    public function setCom_id($id)
    {
    	$this->com_id = $id;
    }
    public function setArt_id($id)
    {
    	$this->art_id = $id;
    }
    public function setCom_pseudo($pseudo)
    {
    	$this->com_pseudo = $pseudo;
    }
    public function setCom_texte($texte)
    {
    	$this->com_texte = $texte;
    }
    public function setCom_datetime($date)
    {
    	$this->com_datetime = DateTime::createFromFormat('Y-m-d H:m:s', $date);
    }

    //getters
    public function getCom_id()
    {
    	return $this->com_id;
    }
    public function getArt_id()
    {
    	return $this->art_id;
    }
    public function getCom_pseudo()
    {
    	return $this->com_pseudo;
    }
    public function getCom_texte()
    {
    	return $this->com_texte;
    }
    public function getCom_datetime()
    {
    	return $this->com_datetime->format('d-m-Y H:i:s');
    }


    public function hydrate($data)
    {
    	foreach($data as $propriete => $valeur)
    	{
    		$methodName = 'set'.ucfirst($propriete);
    		if (method_exists($this, $methodName))
    			$this->$methodName($valeur);
    	}
    }
    
    public static function getListeCommentaires(int $artId)
    {
    	$db = new Database();
    	$datas = $db->query('SELECT  com_texte, com_pseudo FROM commentaire WHERE art_id = ? ORDER BY com_datetime DESC', array($artId));
    	foreach($datas as $data)
    	{
    		$array[] = new Commentaire()->hydrate($data);
    	}
    	return ($array);
    }
}