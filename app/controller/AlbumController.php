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
 	if(isset($data['nomAl']) && isset($data['nomArt']) && isset($data['dateAl']) && isset($data['genre'])) {
  	$this->view->album = Album::envoyerAlbum($data['nomAl'],$data['nomArt'],$data['dateAl'],$data['genre']);
  }
   else {
   echo "Le champ 'Nom d'artiste' n'a pas ete correctement remplie";
  }
  header('location: ajouterArtiste');
 }
	
	
	
	
}

?>