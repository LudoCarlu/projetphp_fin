<?php
class Album {
	public $idAl, $idArt, $nomAl, $dateAl, $genre, $note;
  
	public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album Al JOIN artiste Art ON (Al.idArt = Art.idArt) WHERE Al.idAl =".$id.";" ;
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetch();
	}
	
	public static function getList() {
	$db = Database::getInstance();
	$sql = "SELECT Al.idAl,Art.nomArt,Al.nomAl,Al.dateAl,Al.genre FROM artiste Art JOIN album Al ON (Art.idArt=Al.idArt) ORDER BY nomArt Asc;";
	$stmt = $db->query($sql);
	$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
	return $stmt->fetchAll();
		
	}
	public static function envoyerAlbum($nomAl,$nomArt,$dateAl,$genre) {
		$db = Database::getInstance();
		$residArt = Artiste::getFromNom($nomArt);
		$idArt = $residArt->idArt;
		
		$sql = "INSERT INTO album (idArt,nomAl,dateAl,genre) VALUES (:idArt,:nomAl,:dateAl,:genre)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		return $stmt->execute(array(
		 'idArt' => $idArt,
		 'nomAl'=>$nomAl,
		 'dateAl'=>$dateAl,
		 'genre'=>$genre
		 ));
 	}
	
	public static function getListGenre() {
		$db = Database::getInstance();
		$sql = "SELECT DISTINCT genre FROM album ORDER BY genre Asc";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetchAll();
	}
	
	public static function getListFromArtiste($nomArt) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album Al JOIN artiste Art ON (Al.idArt = Art.idArt) WHERE Art.nomArt ='$nomArt' ORDER BY nomArt Asc";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetchAll();
	}
	
	public static function getListFromGenre($genre) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album Al JOIN artiste Art ON (Al.idArt = Art.idArt) WHERE Al.genre ='$genre' ORDER BY nomArt Asc";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetchAll();
	}
	
	public static function getListFromDate($dateAl) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album Al JOIN artiste Art ON (Al.idArt = Art.idArt) WHERE Al.dateAl ='$dateAl' ORDER BY nomArt Asc";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetchAll();
		
	}
	public static function getListFromNote($note) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album Al JOIN artiste Art ON (Al.idArt = Art.idArt) WHERE Al.note ='$note' ORDER BY nomArt Asc";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetchAll();
		
	}
	
	public static function palmares() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM album Al JOIN artiste Art ON (Al.idArt = Art.idArt) ORDER BY Al.note DESC LIMIT 5";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
		return $stmt->fetchAll();
	}

}

?>