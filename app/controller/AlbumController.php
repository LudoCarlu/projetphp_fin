<?php

class AlbumController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Album::getList();
		$this->view->display(); 
	}
  
	public function afficherAlbum() {
		$id = $this->route["params"]["id"];
		$this->view->album = Album::getFromId($id);
		$this->view->display();
	}
}
?>