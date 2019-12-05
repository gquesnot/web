<?php
	include_once 'class.php';
	class Auteur{
		
		private $aut_id;
		private $aut_nom;
		private $aut_prenom;
		private $aut_pseudo;
		private $aut_password;
		private $is_admin;

		public function __construct()
		{

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

    	public function setAut_id($id)
    	{
    		$this->aut_id = $id;
    	}
    	public function setAut_nom($nom)
    	{
    		$this->aut_nom = $nom;
    	}
    	public function setAut_prenom($prenom)
    	{
    		$this->aut_prenom = $prenom;
    	}
    	public function setAut_pseudo($pseudo)
    	{
    		$this->aut_pseudo = $pseudo;
    	}
    	public function setAut_password($password)
    	{
    		$this->aut_password = $password;
    	}
    	public function setIs_admin($admin)
    	{
    		$db = new Database();
    		$data = $db->queryOne('SELECT admin_id FROM admin WHERE aut_id = ?', array($this->aut_id));
    		if ($data != false)
    			$this->is_admin = 1;
    		else
    			$this->is_admin = 0;
    	}

    	//getters

    	public function  getAut_id()
    	{
    		return $this->aut_id;
    	}
    	public function  getAut_nom()
    	{
    		return $this->aut_nom;
    	}
    	public function  getAut_prenom()
    	{
    		return $this->aut_prenom;
    	}
    	public function  getAut_pseudo()
    	{
    		return $this->aut_pseudo;
    	}
    	public function  getAut_password()
    	{
    		return $this->aut_password;
    	}
    	public function  getIs_admin()
    	{
    		return $this->aut_admin;
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
    	public static function getListeAllAuteur()
    	{
    		$db = new Database();
    		$datas = $db->query('SELECT  aut_id, aut_nom, aut_prenom FROM auteur');
    		foreach($datas as $data)
    		{
    			$tmp = new Auteur();
    			$array[] = $tmp->hydrate($data);
   			}
    		return ($array);
    	}

    	public static function getOneAuteur($aut_id)
    	{
    		$db = new Database();
    		$datas = $db->queryOne('SELECT  aut_id, aut_nom, aut_prenom FROM auteur WHERE aut_id = ?', array($aut_id));
    			return (new Auteur()->hydrate($datas));
    	}


}