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
}
?>