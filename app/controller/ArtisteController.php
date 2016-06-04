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

	public function newArtiste(){
    extract($_POST);
    if(isset($nomArt)) {
			$this->view->artiste = Artiste::envoyerArtiste($nomArt,$anneNaiss,$biographie); 
		}
   else {
			echo "Le champ 'Nom d'artiste' n'a pas ete correctement remplie";
		}
	}
}

?>