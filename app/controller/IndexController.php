<?php

class IndexController extends Controller {
   
   public function index() {
      $this->view->palmares = Album::palmares();
      $this->view->listeArtiste = Artiste::getList();
      $this->view->listeGenre = Album::getListGenre();
      $this->view->display();
   }

}
