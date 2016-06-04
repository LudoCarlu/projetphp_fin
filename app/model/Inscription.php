<?php

class Inscription extends Model {
	public $nom, $prenom, $email, $pseudo, $mdp ;
  
	public static function envoiInscription($pseudo,$mdp1,$email,$prenom,$nom) {                                                                                                  
		$db = Database::getInstance();
		$sql = "INSERT INTO inscription VALUES (:prenom,:nom,:pseudo,:email,:mdp1)";
		$stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Inscription");
		return $stmt->execute(array(
      'prenom'=>$prenom,
			'nom'=>$nom,
			'pseudo'=>$pseudo,
			'email'=>$email,
      'mdp1'=>$mdp1
    ));
		//return $stmt->fetch();
	}

}

?>