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
	$sql = "SELECT Al.idAl,Art.nomArt,Al.nomAl,Al.dateAl,Al.genre FROM artiste Art JOIN album Al ON (Art.idArt=Al.idArt);";
	$stmt = $db->query($sql);
	$stmt->setFetchMode(PDO::FETCH_CLASS, "Album");
	return $stmt->fetchAll();
		
	}
	public static function envoyerAlbum($nomAl,$nomArt,$dateAl,$genre) {
		$db = Database::getInstance();
		$sql = "INSERT INTO album (idArt,nomAl,dateAl,genre) VALUES (:idArt,:nomAl,:dateAl,:genre)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Artiste");
		echo "Merci pour votre ajout !";
		return $stmt->execute(array(
		 'nomArt' => $nomArt,
		 'nomAl'=>$nomAl,
		 'dateAl'=>$dateAl,
		 'genre'=>$genre
		 ));
 	}
}

?>