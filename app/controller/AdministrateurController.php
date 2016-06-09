<?php

class AdministrateurController extends Controller {
  
  public function afficherInscription() {
    $this->view->list = Administrateur::getInscription();
		$this->view->display(); 
  }
	
	public function ajouterUtilisateur() {
		$pseudo= $this->route["params"]["pseudo"];
		Administrateur::ajouterDemande($pseudo);
		header('Refresh: 0 ;/public/administrateur');
	}
	
	public function refuserUtilisateur() {
		$pseudo= $this->route["params"]["pseudo"];
		Administrateur::refuserDemande($pseudo);
		header('Refresh: 0 ;/public/administrateur');
	}
  
}