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
		if(isset($_POST['note'])){
			$note = $_POST['note'];
			$idU = $_SESSION['id'];
			Note::ajouterNote($idAl,$idU,$note);
		}
		$this->view->note = Note::CalculMoyFromId($idAl);
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
		if (isset($nomArt)) {
			$this->view->list = Album::getListFromArtiste($nomArt);
			$this->view->display(); 
		}
	}
	
	public function afficherAlFromGenre() {
		$data = $this->route["params"]["post"];
		$genre = $data['genre'];
		if (isset($genre)) {
			$this->view->list = Album::getListFromGenre($genre);
			$this->view->display(); 
		}
	}
	
	public function afficherAlFromDate() {
		$data = $this->route["params"]["post"];
		$dateAl = $data['dateAl'];
		if (isset($dateAl)) {
			$this->view->list = Album::getListFromDate($dateAl);
			$this->view->display(); 
		}
	}
	
	public function afficherAlFromNote() {
		$data = $this->route["params"]["post"];
		$note = $data['note'];
		if (isset($note)) {
			$this->view->list = Album::getListFromNote($note);
			$this->view->display(); 
		}
	}
	
	public function supprimerCommentaire() {
		$idC= $this->route["params"]["idC"];
		$idAl = $this->route["params"]["idAl"];
		Commentaire::supprimerCommentaire($idC);
		header('Refresh: 0 ;/public/album/afficher/'.$idAl);
	}
}
	

?>