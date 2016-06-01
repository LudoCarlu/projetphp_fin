<?php
class utilisateur {
	public $idU;
	public $email;
	public $mdpU;
	public $pseudo;
	public $nomU;
	public $prenomU;
  
	//Constructeur
  function __construct($email,$mdpU,$pseudo,$nomU,$prenomU) {
   	$this->email = $email;
		$this->mdpU = $mdpU;
		$this->pseudo = $pseudo;
    $this->nomU = $nomU;
    $this->prenomU = $prenomU;
  }
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
}

?>