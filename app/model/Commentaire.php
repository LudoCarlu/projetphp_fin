<?php
class Commentaire extends Model {
  public $idC,$idAl,$idU,$comment;
  
	public static function getListeFromAlbum( $idAl ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM commentaire WHERE idAl=".$idAl;
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
		return $stmt->fetchAll();
	}
  
  public static function getListeFromUtilisateur( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM commentaire WHERE idU=".$id;
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
		return $stmt->fetchAll();
	}
  public static function ajouterCommentaire() {
    $db = Database::getInstance();
    $sql = "INSERT INTO commentaire (idAl,idU) VALUES (:idAl,:idU)";
    $stmt = $db->prepare($sql);
  }
}
?>