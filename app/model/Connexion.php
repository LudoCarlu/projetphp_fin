<?php
class Connexion extends Model {
	public $pseudo, $mdp ;
  
	public static function verifierConnexion($pseudo,$mdp) {
    
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
		$sql2 = "SELECT * FROM administrateur WHERE pseudo = :pseudo";
    $stmt = $db->prepare($sql);
		$stmt2 = $db->prepare($sql2);
    $stmt->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
		$stmt2->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
    $stmt->execute();
		$stmt2->execute();
    $resultat = $stmt->fetch();
    $resultat2 = $stmt2->fetch();
		
		
    
    if ($resultat['mdpU'] == $mdp ) {
			session_start();
      $_SESSION['pseudo'] = $resultat['pseudo'];
      $_SESSION['id'] = $resultat['idU'];
      $_SESSION['droit'] = 'utilisateur';
			if($resultat["dateDeco"] != null) {
				$_SESSION["dateDeco"] = $resultat["dateDeco"];
			}
      $message = '<p>Bienvenue '.$_SESSION['pseudo'].', vous etes maintenant connecte !</p>';
    }
    if ($resultat2['mdpAdmin'] == $mdp) {
			if(!isset($_SESSION["droit"])) {
				session_start();
			}
      $_SESSION['pseudo'] = $resultat2['pseudo'];
      $_SESSION['id'] = $resultat2['idA'];
      $_SESSION['droit'] = 'administrateur';
			if($resultat2["dateDeco"] != null) {
				$_SESSION["dateDeco"] = $resultat2["dateDeco"];
			}
      $message = '<p>Bienvenue '.$_SESSION['pseudo'].', vous etes maintenant connecte !</p>';
    }
    
    if ($resultat['mdpU'] != $mdp && $resultat2['mdpAdmin'] != $mdp) {
      $message = "<p> Une erreur s'est produite durant votre authentification. Votre mot de passe ou pseudo est incorrecte </p>";
    }
    $_SESSION['message'] = $message;
    
	}
	
	public function changeDateDeco() {
		$aujourdhui = getdate();
    $d = $aujourdhui['mday'];
    $m = $aujourdhui['mon'];
    $y = $aujourdhui['year'];
    $heure = $aujourdhui['hours'];
    $min = $aujourdhui['minutes'];
    $sec = $aujourdhui['seconds'];
		
		if($_SESSION["droit"] == "administrateur") {
			$db = Database::getInstance();
			$sql = "UPDATE administrateur SET dateDeco ='$y-$m-$d $heure:$min:$sec' WHERE idA =".$_SESSION['id'];
			$stmt = $db->query($sql);
			$stmt->fetch();
		}
		if($_SESSION["droit"] == "utilisateur") {
			$db = Database::getInstance();
			$sql = "UPDATE utilisateur SET dateDeco ='$y-$m-$d $heure:$min:$sec' WHERE idU =".$_SESSION['id'];
			$stmt = $db->query($sql);
			$stmt->fetch();
		}
		
	}
	
	
}
?>