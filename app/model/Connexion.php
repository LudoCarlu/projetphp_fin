<?php

class Connexion extends Model {
	public $pseudo, $mdp ;
  
	public static function verifierConnexion($pseudo,$mdp) {
    //echo $pseudo;
    //echo $mdp;
    
		$db = Database::getInstance();
		$sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':pseudo',$pseudo,PDO::PARAM_STR); 
    $stmt->execute();
    $resultat = $stmt->fetch();
    
    
    $sql2 = "SELECT idAdmin,pseudo,mdpAdmin FROM administrateur WHERE pseudo = :pseudo";
    $stmt2 = $db->prepare($sql2);
    $stmt2->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
    $stmt2->execute();
    $resultat2 = $stmt2->fetch();
    echo $resultat2['idAdmin'];
    echo $resultat2['pseudo'];
    echo $resultat2['mdpAdmin'];
    
    if ($resultat['mdpU'] == $mdp ) {
      echo "Utilisateur";
      $_SESSION['pseudo'] = $resultat['pseudo'];
      $_SESSION['id'] = $resultat['idU'];
      $_SESSION['nom'] = $resultat['nomU'];
      $_SESSION['prenom'] = $resultat['prenomU'];
      $_SESSION['droit'] = 'utilisateur';
      $message = '<p>Bienvenue '.$_SESSION['pseudo'].', vous etes maintenant connecte !</p>';
    }
    if ($resultat2['mdpAdmin'] == $mdp) {
      echo "Admin";
      $_SESSION['pseudo'] = $resultat2['pseudo'];
      $_SESSION['id'] = $resultat2['idAdmin'];
      $_SESSION['droit'] = 'administrateur';
      $message = '<p>Bienvenue '.$_SESSION['pseudo'].', vous etes maintenant connecte !</p>';
    }
    
    if ($resultat['mdpU'] != $mdp && $resultat2['mdpAdmin'] != $mdp) {
      $message = "<p> Une erreur s'est produite durant votre authentification. Votre mot de passe ou pseudo est incorrecte </p>";
    }
    $_SESSION['message'] = $message;
    
	}

}

?>