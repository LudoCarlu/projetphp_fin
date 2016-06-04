<?php

class Administrateur extends Model {
	public $idA, $pseudo, $email, $mdpAdmin;

	public function toHTML()
	{
		return ($this->pseudo)." ".($this->email);
	}
  
	public static function getInscription() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM inscription";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Inscription");
		return $stmt->fetchAll();
	}
	
	public static function ajouterDemande($pseudo) {
		$db = Database::getInstance();
		//On recupere la demande grace au pseudo de la personne
		$sql = "SELECT * FROM inscription WHERE pseudo = :pseudo";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$stmt->execute();
		$res = $stmt->fetch();
		
		//On l'insert dans la base utilisateur
		$sql = "INSERT INTO utilisateur (email,mdpU,pseudo,nomU,prenomU) VALUES (:email,:mdp,:pseudo,:nom,:prenom)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
		$stmt->execute(array(
      'prenom'=>$res['prenom'],
			'nom'=>$res['nom'],
			'pseudo'=>$res['pseudo'],
			'email'=>$res['email'],
      'mdp'=>$res['mdp']
    ));
		
		$sql = "DELETE FROM inscription WHERE pseudo = :pseudo";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$stmt->execute();
		
	}
}
?>