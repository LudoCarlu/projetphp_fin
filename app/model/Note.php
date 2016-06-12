<?php
class Note extends Model {
  public $idN,$idAl,$idU,$note;
  
	public static function getListeFromAlbum( $idAl ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM note WHERE idAl=".$idAl;
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Note");
		return $stmt->fetchAll();
	}
  
	public static function getListeFromUtilisateur( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM note WHERE idU=".$id;
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Note");
		return $stmt->fetchAll();
	}
  
  public static function ajouterNote($idAl,$idU,$note) {
    $db = Database::getInstance();
    $sql = "INSERT INTO note (idAl,idU,note) VALUES (:idAl,:idU,:note)";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Note");
    return $stmt->execute(array(
      ':idAl' => $idAl,
      ':idU' => $idU,
      ':note' =>$note
    ));
  }
}
?>