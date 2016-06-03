<?php
class ConnexionController extends Controller {
	
	public function Connexion(){
		$this->view->display(); 
	}
  public function verifierConnexion() {
    extract($_POST);
    if(isset($pseudo) && isset($mdp)) {
			$this->view->connexion = Connexion::verifierConnexion($pseudo,$mdp);
			$this->view->display();
  	}
  }
}
?>