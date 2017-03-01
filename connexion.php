<?php

class DB{
	
	public $host = "localhost";
    private $identifiant = "root";
    private $mdp = "";
    private $nom_bd = "meme";
    public $db;
        
    public function __construct($host = null, $identifiant = null, $mdp = null, $nom_bd = null){
		if($host != null){
			$this->host = $host;
			$this->identifiant = $identifiant;
			$this->mdp = $mdp;
			$this->nom_bd = $nom_bd;
		}
		try{
		$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->nom_bd, $this->identifiant, $this->mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		}catch(PDOException $e){
			die('Impossible de se connecter à la base de donnée');
		}
	}

   	public function query($sql, $data = array()){
		$req= $this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
}    
?>
