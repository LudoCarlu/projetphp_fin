<?php

class IndexController extends Controller {
   
   public function index() {
      $this->view->listeArtiste = Artiste::getList();
      $this->view->display();
   }

}
