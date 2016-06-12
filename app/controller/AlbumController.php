<?php

class AlbumController extends Controller {
	
	public function afficherListe(){
		$this->view->list = Album::getList();
		$this->view->display(); 
	}
  
	public function afficherAlbum() {
		//On recup la session
		session_start();
		$idAl = $this->route["params"]["id"];
		if(isset($_POST['commentaire'])) {
			$comment = $_POST['commentaire'];
			$idU = $_SESSION['id'];
			Commentaire::ajouterCommentaire($idAl,$idU,$comment);
		}
		
		$this->view->album = Album::getFromId($idAl);
		$this->view->com = Commentaire::getListeFromAlbum($idAl);
		$this->view->display();
	}
	public function ajouterAlbum(){
		$this->view->list = Artiste::getList();
  	$this->view->display();
 }
	
 	public function envoyerAlbum() {
  	$data = $this->route["params"]["post"];
  	if(isset($data['nomArt']) && isset($data['dateAl']) && isset($data['genre']) && isset($data['nomAl'])) {
   		$this->view->album = Album::envoyerAlbum($data['nomAl'],$data['nomArt'],$data['dateAl'],$data['genre']);
  	}
  	header('location: ajouterAlbum');
 	}
}
	

?>