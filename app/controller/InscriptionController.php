<?php

class InscriptionController extends Controller {
	
	public function Inscription(){
		$this->view->display(); 
	}
  public function verifierInscription() {
    echo "<p> Un administrateur prendra en charge votre demande </p>";
    extract($_POST);
    if(isset($pseudo) && isset($mdp1) && isset ($mdp2) && isset($email) && isset($prenom) && isset($nom)) {
      if($mdp1 != $mdp2) {
        echo "<p>Les mots de passe ne sont pas identiques</p>";
      }
      else {
        //Cryptage du mdp
        $mdp1 = sha1($mdp1);
        $this->view->inscription = Inscription::envoiInscription($pseudo,$mdp1,$email,$prenom,$nom);
      } 
    }
  }
}
?>