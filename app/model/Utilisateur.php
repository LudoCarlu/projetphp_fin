<?php
class Utilisateur {
	public $idU, $email, $mdpU, $pseudo, $nomU, $prenomU;
  
	public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur WHERE idU =".$id;
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		return $stmt->fetch();
	}
	
	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur ORDER BY pseudo ASC";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		return $stmt->fetchAll();
	}
	

}

?>