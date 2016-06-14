<?php

class IndexController extends Controller {
   
   public function index() {
      //On recupere la session pour avoir la date de deconnection de l'utilisateur
      session_start();
      $this->view->palmares = Album::palmares();
      $this->view->listeArtiste = Artiste::getList();
      $this->view->listeGenre = Album::getListGenre();
      $this->view->utilisateur = Utilisateur::getList();
      $this->view->listeNote = Note::listeNoteAlbum();
      if(isset($_SESSION['dateDeco'])) {
        
        $this->view->actualite = Commentaire::listeComDerConnexion($_SESSION['dateDeco']);
      }
      $this->view->display();
   }

}
