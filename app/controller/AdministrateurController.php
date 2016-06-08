<?php

class AdministrateurController extends Controller {
  
  public function afficherInscription() {
    $this->view->list = Administrateur::getInscription();
		$this->view->display(); 
  }
	public function ajouterUtilisateur() {
		$pseudo= $this->route["params"]["pseudo"];
		Administrateur::ajouterDemande($pseudo);
		//$this->view->list = Administrateur::getInscription();
		//$this->load->helper('url');
		header('Refresh: 0 ;/public/administrateur');
		//$this->view->redirection();
		
	}

  
}