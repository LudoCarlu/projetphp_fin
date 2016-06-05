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

 public function ajouterArtiste(){
  $this->view->display();
 }
 public function envoyerArtiste() {
  $data = $this->route["params"]["post"];
    if(isset($data['nomArt']) && isset($data['anneeNaiss']) && isset($data['biographie'])) {
   $this->view->artiste = Artiste::envoyerArtiste($data['nomArt'],$data['anneeNaiss'],$data['biographie']);
  }
   else {
   echo "Le champ 'Nom d'artiste' n'a pas ete correctement remplie";
  }
  $this->view->redirection();
 }
}

?>