<?php

class ArtisteController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Artiste::getList();
		$this->view->display(); 

	}
	public function afficherArtiste() {
		$id = $this->route["params"]["id"];
		$this->view->artiste = Artiste::getFromId($id);
		$this->view->display();
	}
}
?>