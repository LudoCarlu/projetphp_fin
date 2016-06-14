<?php

class InscriptionController extends Controller {
	
	public function Inscription(){
		$this->view->display(); 
	}
  public function verifierInscription() {
    extract($_POST);
    if(isset($pseudo) && isset($mdp1) && isset ($mdp2) && isset($email) && isset($prenom) && isset($nom)) {
        $this->view->inscription = Inscription::envoiInscription($pseudo,$mdp1,$mdp2,$email,$prenom,$nom);
				$this->view->display();
    } 
  }
}
?>