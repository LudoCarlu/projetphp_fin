<?php
class Commentaire extends Model {
  public $idC,$idAl,$idU,$comment;
	
	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM commentaire ORDER BY date DESC";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
		return $stmt->fetchAll();
	}
  
	public static function getListeFromAlbum( $idAl ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM commentaire WHERE idAl=".$idAl." ORDER BY date DESC";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
		return $stmt->fetchAll();
	}
  
	public static function getListeFromUtilisateur( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM commentaire C JOIN album A ON (C.idAl = A.idAl) WHERE C.idU=".$id." ORDER BY date DESC";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
		return $stmt->fetchAll();
	}
	
  public static function ajouterCommentaire($idAl,$idU,$comment) {
    $db = Database::getInstance();
    $sql = "INSERT INTO commentaire (idAl,idU,commentaire,date) VALUES (:idAl,:idU,:commentaire,:date)";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
    $aujourdhui = getdate();
    $d = $aujourdhui['mday'];
    $m = $aujourdhui['mon'];
    $y = $aujourdhui['year'];
    $heure = $aujourdhui['hours'];
    $min = $aujourdhui['minutes'];
    $sec = $aujourdhui['seconds'];
    return $stmt->execute(array(
      ':idAl' => $idAl,
      ':idU' => $idU,
      ':commentaire' =>$comment,
      ':date' => $y."-".$m."-".$d." ".$heure.":".$min.":".$sec
    ));
  }
	public static function supprimerCommentaire($idC) {
		$db = Database::getInstance();
		$sql = "DELETE FROM commentaire WHERE idC = :idC";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':idC',$idC,PDO::PARAM_STR);
		$stmt->execute();
	}
	
	public static function listeComDerConnexion($date) {
		$db = Database::getInstance();
		$sql = "SELECT U.pseudo,A.nomAl,Art.nomArt,C.commentaire,C.date FROM commentaire C JOIN album A JOIN artiste Art JOIN utilisateur U
						ON (C.idAl = A.idAl AND A.idArt=Art.idArt AND C.idU = U.idU) 
						WHERE C.date >='$date' ORDER BY date DESC LIMIT 5";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
		return $stmt->fetchAll();
	}
}
?>