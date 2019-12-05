<?php
include_once 'class.php';
class Article {
	private $art_id;
	private $aut_id;
	private $cat_id;
	private $art_titre;
	private $art_contenu;
	private $art_datetime;
	private $art_img;

	public function __construct(){

	}

	  // destructeur : si vide pas obligatoire 
    public function __destruct() {
        echo 'Objet supprimé';
    }

    // quand on fait appel à une méthode qui n'existe pas
    public function __call($method, $args) {
        echo '<br><strong>La méthode '.$method.' n\'existe pas ou n\'est pas accessible</strong><br>';
    }
    
    // quand on essaie de lire une propriété qui n'existe pas
    public function __get($prop) {
        echo '<br><strong>La propriété '.$prop.' n\'existe pas ou n\'est pas accessible</strong><br>';
    }
    
    // quand on essaie de modifier une propriété qui n'existe pas
    public function __set($prop, $val) {
        echo '<br><strong>La propriété '.$prop.' n\'existe pas ou n\'est pas disponible</strong><br>';
    }
    
    // quand on essaie d'afficher directement l'objet avec un echo
    public function __toString() {
        return '<h1>Article en cours : '.$this->art_titre.'</h2>';
    }
    
	//setters
	public setArt_id($id)
	{
		$this->art_id = $id;
	}
	
	public setAut_id($id)
	{
		$this->Aut_id = $id;
	}

	public setCat_id($id)
	{
		$this->cat_id = $id;
	}

	public setArt_titre($titre)
	{
		$this->art_id = $titre;
	}

	public setArt_contenu($contenu)
	{
		$this->art_id = $contenu;
	}

	public setArt_datetime($datetime)
	{
		$this->art_datetime = DateTime::createFromFormat("Y-m-d H:m:s", $datetime);
	}

	public setArt_img($img)
	{
		$this->art_img = $img;
	}

	//getters
	public getArt_id()
	{
		return $this->art_id;
	}
	
	public getAut_id()
	{
		return $this->Aut_id;
	}

	public getCat_id()
	{
		return $this->cat_id;
	}

	public getArt_titre()
	{
		return $this->art_id;
	}

	public getArt_contenu()
	{
		return $this->art_id;;
	}

	public getArt_datetime()
	{
		return $this->$art_datetime->format('d-m-Y H:i:s');
	}

	public getArt_img()
	{
		return $this->art_img;
	}


	   // hydratation (non, il ne s'agit pas de boire des bières)	
    public function hydrate($data) {
        /*
        $this->setArt_id($data['art_id']);
        $this->setArt_contenu($data['art_contenu']);
        */
        // on boucle sur $data
        foreach($data as $propriete => $valeur) { // $propriete (index du tableau) = art_id / $valeur (valeur) = 1
          $methodName = 'set'.ucfirst($propriete); // set + art_id => Art_id  => setArt_id - setArt_contenu // on génère le nom de la méthode 
          if(method_exists($this, $methodName)) { // si la méthode existe dans la classe courante alors on l'exécute 
            $this->$methodName($valeur);
          }
        }
    }
    // méthodes statiques 
    public static function getAllArticles() {
        $db = new Database;
        $datas = $db->query('SELECT art_id , aut_nom, aut_prenom, cat_nom, art_datetime, art_titre, art_contenu FROM article INNER JOIN auteur ON article.aut_id = auteur.aut_id INNER JOIN categorie ON article.cat_id = categorie.cat_id ORDER BY art_datetime DESC');
        foreach($datas as $data)
        {
        	$array[] =  new Article()->hydrate($data);
        }        
        return $array;
    }

    public static function getOneArticle($artId) {
        $db = new Database;
        $datas = $db->queryOne('SELECT art_id , aut_nom, aut_prenom, cat_nom, art_datetime, art_titre, art_contenu FROM article INNER JOIN auteur ON article.aut_id = auteur.aut_id INNER JOIN categorie ON article.cat_id = categorie.cat_id WHERE art_id = ? ORDER BY art_datetime DESC', arrray($artId));
        return (new Article()->hydrate($data));
    }

    public static function getAllMyArticles($autId)
    {
    	$db = new Database;
    	$datas = $db->query('SELECT art_id, art_titre, art_contenu, aut_nom, aut_prenom,cat_nom FROM article INNER JOIN categorie ON article.cat_id = categorie.cat_id  INNER JOIN auteur ON auteur.aut_id = article.aut_id WHERE auteur.aut_id = ? ORDER BY art_datetime DESC', array($autId));
    	foreach($datas as $data)
        {
        	$array[] =  new Article()->hydrate($data);
        }        
        return $array;
    }
}