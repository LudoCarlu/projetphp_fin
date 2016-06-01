<?php
class Utilisateur {
	public $idU, $email, $mdpU, $pseudo, $nomU, $prenomU;
  
	/*//Constructeur
  function __construct($email,$mdpU,$pseudo,$nomU,$prenomU) {
   	$this->email = $email;
		$this->mdpU = $mdpU;
		$this->pseudo = $pseudo;
    $this->nomU = $nomU;
    $this->prenomU = $prenomU;
  }*/
  function __toString() {
    return $this->prenomU." ".$this->nomU;
  }
	//Getteurs
	public function getId() {
		return $this->idU;
	} 
	public function getEmail() {
		return $this->email;
	}
	public function getMdp() {
		return $this->mdpU;
	}
	public function getPseudo() {
		return $this->pseudo;
	}
  public function getPrenom() {
    return $this->prenomU;
  }
  public function getNom() {
    return $this->nomU;
  }
	//Setteurs 
  public function setId($id) {
    $this->idU = $id;
	}
	public function setEmail($mail) {
		$this->email = $mail;
	}
	public function setMdp($mdp) {
		return $this->mdpU = $mdp; 
	}
  public function setPseudo($p) {
    $this->pseudo = $p;
	}
  public function setPrenom($p) {
    $this->prenomU = $p;
  }
  public function setNom($n) {
    $this->nomU = $n;
  }
	
	public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilistateur WHERE idU = $id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		$stmt->execute(array(":id" => $id));
		return $stmt->fetch();
	}
	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		return $stmt->fetchAll();
	}
	

}

?>