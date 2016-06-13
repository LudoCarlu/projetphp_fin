<?php
class Artiste extends Model{
	public $idArt,$nomArt,$prenomArt,$dateNaiss,$biographie;
  
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
		$sql = "SELECT * FROM artiste ORDER BY nomArt Asc";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		return $stmt->fetchAll();
	}
	
	public static function getFromNom ( $nom ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM artiste WHERE nomArt = :nom";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		$stmt->execute(array(":nom" => $nom));
		return $stmt->fetch();
	}
	
	public static function envoyerArtiste($nomArt,$dateNaiss,$biographie) {
		$db = Database::getInstance();
		$sql = "INSERT INTO artiste (nomArt,dateNaiss,biographie) VALUES (:nomArt,:dateNaiss,:biographie)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		echo "Merci pour votre ajout ";
		return $stmt->execute(array(
		 'nomArt' => $nomArt,
		 'dateNaiss'=>$dateNaiss,
		 'biographie'=>$biographie
		 ));
 }
	
}

?>
