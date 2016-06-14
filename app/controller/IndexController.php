<?php

class IndexController extends Controller {
   
   public function index() {
      $this->view->palmares = Album::palmares();
      $this->view->listeArtiste = Artiste::getList();
      $this->view->listeGenre = Album::getListGenre();
<<<<<<< HEAD
      $this->view->utilisateur = Utilisateur::getList();
=======
      $this->view->listeNote = Note::listeNoteAlbum();
>>>>>>> bc69335eba42791a9ad811951c1cef86d846ef0b
      $this->view->display();
   }

}
