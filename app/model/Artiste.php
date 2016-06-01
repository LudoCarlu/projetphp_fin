<?php
class Artiste extends Model{
	public $idArt,$nomArt,$prenomArt,$dateNaiss,$biographie;
  
	//Constructeur
  /*function __construct($id,$nom,$prenom,$dateNaiss,$biographie) {
		$this->idArt = $id;
		$this->nomArt = $nom;
		$this->prenomArt = $prenom; 
		$this->dateNaiss = $dateNaiss; 
		$this->biographie = $biographie;

  }*/
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
	
	/*public static function setFromId( $id,$data ) {                                                                                                  
		$db = Database::getInstance();
		$sql = "UPDATE artiste set nomArt=:nom,prenomArt=:prenom,anneeNaiss=:dateNaiss,biographie=:biographie WHERE idArt = :id";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		return $stmt->execute(array(
			":id" => $id,
			":nom"=>$data['nom'],
			":prenom"=>$data['prenom'],
			":dateNaiss"=>$data['dateNaiss'],
			":biographie"=>$data['biographie'],
			));
		//return $stmt->fetch();
	}*/
	public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM artiste WHERE idArt = $id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		$stmt->execute(array(":id" => $id));
		return $stmt->fetch();
	}
	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM artiste";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		return $stmt->fetchAll();
	}
	
}

?>
