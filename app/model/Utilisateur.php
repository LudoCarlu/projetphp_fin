<?php
class Utilisateur {
	public $idU, $email, $mdpU, $pseudo, $nomU, $prenomU;
  
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