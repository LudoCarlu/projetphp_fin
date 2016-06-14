<?php

class AdministrateurController extends Controller {
  
  public function afficherInscription() {
    $this->view->list = Administrateur::getInscription();
		$this->view->display(); 
  }
	
	public function ajouterUtilisateur() {
		$pseudo= $this->route["params"]["pseudo"];
		Administrateur::ajouterDemande($pseudo);
		header('Refresh: 0 ;/public/administrateur/inscription');
	}
	
	public function refuserUtilisateur() {
		$pseudo= $this->route["params"]["pseudo"];
		Administrateur::refuserDemande($pseudo);
		header('Refresh: 0 ;/public/administrateur/inscription');
	}
  
	public function afficherCommentaire() {
		$this->view->list = Commentaire::getList();
		$this->view->display();
	}
	
	public function supprimerCommentaire() {
		$idC= $this->route["params"]["idC"];
		Commentaire::supprimerCommentaire($idC);
		header('Refresh: 0 ;/public/administrateur/commentaire');
	}
}
?>