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
      $message = '<p>Bienvenue '.$_SESSION['pseudo'].', vous etes maintenant connecte !</p>';
    }
    if ($resultat2['mdpAdmin'] == $mdp) {
			session_start();
      $_SESSION['pseudo'] = $resultat2['pseudo'];
      $_SESSION['id'] = $resultat2['idA'];
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