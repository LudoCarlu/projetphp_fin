<?php
class artiste {
	public $idArt;
	public $nomArt;
	public $prenomArt;
	public $dateNaiss;
	public $biographie;
  
	//Constructeur
  function __construct($nom,$prenom,$dateNaiss,$biographie) {
		$this->nomArt = $nom;
		$this->prenomArt = $prenom; 
		$this->dateNaiss = $dateNaiss; 
		$this->biographie = $biographie;

  }
  function __toString() {
    return $this->prenomArt." ".$this->nomArt;
  }
	//Getteurs
	public function getId() {
		return $this->idArt;
	} 
  public function getPrenom() {
    return $this->prenomArt;
  }
  public function getNom() {
    return $this->nomArt;
  }
	public function getDateNaiss() {
		return $this->dateNaiss;
	}
	public function getBiographie() {
		return $this->biographie;
	}
	//Setteurs 
  public function setId($id) {
    $this->idU = $id;
	}
  public function setPrenom($p) {
    $this->prenomU = $p;
  }
  public function setNom($n) {
    $this->nomU = $n;
  }
	public function setDateNaiss($d) {
		$this->dateNaiss = $d;
	}
	public function setBiographie($b) {
		$this->biographie = $b;
	}
}

?>
