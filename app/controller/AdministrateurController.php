<?php

class AdministrateurController extends Controller {
  
  public function afficherInscription {
    $this->view->list = Administrateur::getInscription();
		$this->view->display(); 
  }
  
}