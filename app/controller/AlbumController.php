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
		echo $_POST['note'];
		if(isset($_POST['commentaire'])) {
			$comment = $_POST['commentaire'];
			$idU = $_SESSION['id'];
			Commentaire::ajouterCommentaire($idAl,$idU,$comment);
		}
<<<<<<< HEAD
		if(isset($_POST['note'])){
			$note = $_POST['note'];
			$idU = $_SESSION['id'];
			Note::ajouterNote($idAl,$idU,$note);
		}
=======
>>>>>>> d9122dfc07364a2a26498198d29977d9ec7be0de
		
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
	
	public function afficherAlFromArtiste() {
		$data = $this->route["params"]["post"];
		$nomArt = $data['artiste'];
		//echo $nomArt;
		if (isset($nomArt)) {
			$this->view->list = Album::getListFromArtiste($nomArt);
			$this->view->display(); 
		}
	}
	
	public function afficherAlFromGenre() {
		$data = $this->route["params"]["post"];
		$genre = $data['genre'];
		//echo $nomArt;
		if (isset($genre)) {
			$this->view->list = Album::getListFromGenre($genre);
			$this->view->display(); 
		}
	}
}
	

?>