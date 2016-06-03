<?php
class ConnexionController extends Controller {
	
	public function Connexion(){
		$this->view->display(); 
	}
  
  public function verifierConnexion() {
    extract($_POST);
    if(isset($pseudo) && isset($mdp)) {
      $db = Database::getInstance();
      $sql = "SELECT pseudo,prenomU,nomU,idU,mdpU FROM utilisateur WHERE pseudo = :pseudo";
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
      //$stmt->setFetchMode(PDO::FETCH_CLASS, "Utilisateur");
      $stmt->execute();
      $data = $stmt->fetch();

      if ($data['mdpU'] == $_POST['mdp']) { //Acces OK
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['id'] = $data['idU'];
        $_SESSION['nom'] = $data['nomU'];
        $_SESSION['prenom'] = $data['prenomU'];

        $message = '<p>Bienvenue '.$_SESSION['pseudo'].', vous etes maintenant connecte !</p>';
    }
    else // Acces pas OK !
    {
        $message = "<p> Une erreur s'est produite durant votre authentification. Votre mot de passe ou pseudo est incorrecte </p>";
        /*"<p> Cliquez <a href='<?php echo BASE_URL;?>' > ici </a> pour revenir a la page d acceuil </p>"*/
    }	
		$_SESSION['message'] = $message;
		$this->view->display();
    //echo "<p>Cliquez <a href=./public > ici </a> pour revenir à la page d accueil</p>";
  }
  }
}
?>