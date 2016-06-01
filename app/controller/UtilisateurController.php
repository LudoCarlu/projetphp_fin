<?php

class UtilisateurController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Utilisateur::getList();
		$this->view->display(); 
	}
  
	public function afficherArtiste() {
		$id = $this->route["params"]["id"];
		$this->view->utilisateur = Utilisateur::getFromId($id);
		$this->view->display();
	}
}
?>