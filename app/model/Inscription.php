<?php

class Inscription extends Model {
	public $nom, $prenom, $email, $pseudo, $mdp ;
  
	public static function envoiInscription($pseudo,$mdp1,$email,$prenom,$nom) {                                                                                                  
		$db = Database::getInstance();
		
		$sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
		$sql2 = "SELECT * FROM inscription WHERE pseudo = :pseudo";
		$sql3 = "SELECT * FROM utilisateur WHERE email = :email";
		$sql4 = "SELECT * FROM inscription WHERE email = :email";
		
    $stmt = $db->prepare($sql);
		$stmt2 = $db->prepare($sql2);
		$stmt3 = $db->prepare($sql3);
		$stmt4 = $db->prepare($sql4);
		
    $stmt->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$stmt2->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$stmt3->bindValue(':email',$email,PDO::PARAM_STR);
		$stmt4->bindValue(':email',$email,PDO::PARAM_STR);
		
    $stmt->execute();
		$stmt2->execute();
		$stmt3->execute();
		$stmt4->execute();
		
    $resultat = $stmt->fetch();
    $resultat2 = $stmt2->fetch();
		$resultat3 = $stmt3->fetch();
		$resultat4 = $stmt4->fetch();
		
		if (!$resultat && !$resultat2 && !$resultat3 && !$resultat4) {
			echo "Im here";
			$insert = "INSERT INTO inscription VALUES (:prenom,:nom,:pseudo,:email,:mdp1)";
			$stmtinsert = $db->prepare($insert);
    	$stmtinsert->setFetchMode(PDO::FETCH_CLASS, "Inscription");
			return $stmtinsert->execute(array(
      'prenom'=>$prenom,
			'nom'=>$nom,
			'pseudo'=>$pseudo,
			'email'=>$email,
      'mdp1'=>$mdp1
    ));
		} else {
			if($resultat || $resultat2) {
				$_SESSION['message'] = "<p> Votre pseudo est deja pris </p>";
		}
			if ($resultat3 || $resultat4) {
				$_SESSION['message'] = "<p> Votre email est deja pris </p>";
			}
		}
		//return $stmt->fetch();
	}

}

?>