<?php

class UtilisateurController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Utilisateur::getList();
		$this->view->display(); 
	}
  
	public function afficherUtilisateur() {
		$id = $this->route["params"]["id"];
		$this->view->utilisateur = Utilisateur::getFromId($id);
		$this->view->com = Commentaire::getListeFromUtilisateur($id);
		$this->view->note = Note::getListeFromUtilisateur($id);
		$this->view->display();
	}
}
?>