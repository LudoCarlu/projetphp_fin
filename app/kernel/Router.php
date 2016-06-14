<?php
class Router {
   public static function analyze( $query ) {
   	$result = array(
         "controller" => "Error",
         "action" => "error404",
         "params" => array()
	 	);
    if( $query === "" || $query === "/" ) {
    	$result["controller"] = "Index";
		 	$result["action"] = "index";
			
		} else {
		  $parts = explode("/", $query);
		  if($parts[0] == "contact")  {
			  if (count($parts) == 1){
				  $result["controller"] = "Contact";
				  $result['action'] = "afficherListe";
			  }
			  if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";
                       
			  }
			  if ( (count($parts) == 3) && ($parts[1] == "afficher") && ($parts[0] == "contact")){
					  $result["controller"] = "Contact";
					  $result["action"] = "afficherContact";
					  $result["params"]["id"] = $parts[2];        
				}
			  //
			  if ((count($parts) == 3) && ($parts[1] == "modifier")){
				  $result["controller"] = "Contact";
				  $result["action"] = "modifierContact";
				  $result["params"]["id"]= $parts[2];
				  $result["params"]["post"]= $_POST;
			  }
			  //
		  }
			if($parts[0] == "artiste")  {
			  if (count($parts) == 1){
				  $result["controller"] = "Artiste";
				  $result['action'] = "afficherListe";
			  }
			  if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";
            //$result["params"]["slug"] = $parts[1];            
			  }
			  if ( (count($parts) == 3) && ($parts[1] == "afficher") && ($parts[0] == "artiste")){
					  $result["controller"] = "Artiste";
					  $result["action"] = "afficherArtiste";
					  $result["params"]["id"] = $parts[2];        
				}
			  //
			  if ((count($parts) == 3) && ($parts[1] == "modifier")){
				  $result["controller"] = "Artiste";
				  $result["action"] = "modifierArtiste";
				  $result["params"]["id"]= $parts[2];
				  $result["params"]["post"]= $_POST;
			  }
			  if ((count($parts) == 2) && ($parts[1] == "ajouterArtiste")) {
				 $result["controller"] = "Artiste";
				 $result["action"] = "ajouterArtiste";
				}
				if ((count($parts) == 2) && ($parts[1] == "envoyerArtiste")) {
				 $result["controller"] = "Artiste";
				 $result["action"] = "envoyerArtiste";
				 $result["params"]["post"]= $_POST;
				 $result["redirection"] = "ajouterArtiste";
				}
		  }
			
			if($parts[0] == "utilisateur")  {
			  if (count($parts) == 1){
				  $result["controller"] = "Utilisateur";
				  $result['action'] = "afficherListe";
			  }
			  if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";
                        
			  }
			  if ((count($parts) == 3) && ($parts[1] == "afficher")){
					  $result["controller"] = "Utilisateur";
					  $result["action"] = "afficherUtilisateur";
					  $result["params"]["id"] = $parts[2];        
				}
				if ((count($parts) == 3) && ($parts[1] == "afficherProfil") && ($parts[0] == "utilisateur")){
				  $result["controller"] = "Utilisateur";
				  $result["action"] = "afficherUtilisateur";
				  $result["params"]["post"]= $_POST;
			  }
				     
				
				
		  }
			
			
			
			if($parts[0] == "album")  {
			  if (count($parts) == 1){
				  $result["controller"] = "Album";
				  $result['action'] = "afficherListe";
			  }
			  if ((count($parts) == 2) && ($parts[1] == "afficher")){
            $result["controller"] = "Index";
            $result["action"] = "afficherListe";       
			  }
				
			  if ( (count($parts) == 3) && ($parts[1] == "afficher") && ($parts[0] == "album")){
					  $result["controller"] = "Album";
					  $result["action"] = "afficherAlbum";
					  $result["params"]["id"] = $parts[2];        
				}
				if ((count($parts) == 3) && ($parts[1] == "date") && ($parts[0] == "album")){
				  $result["controller"] = "Album";
				  $result["action"] = "afficherAlFromDate";
				  $result["params"]["post"]= $_POST;
			  }
				if ((count($parts) == 3) && ($parts[1] == "artiste") && ($parts[0] == "album")){
				  $result["controller"] = "Album";
				  $result["action"] = "afficherAlFromArtiste";
				  $result["params"]["post"]= $_POST;
			  }
				if ((count($parts) == 3) && ($parts[1] == "genre") && ($parts[0] == "album")){
				  $result["controller"] = "Album";
				  $result["action"] = "afficherAlFromGenre";
				  $result["params"]["post"]= $_POST;
			  }
				if ((count($parts) == 3) && ($parts[1] == "note") && ($parts[0] == "album")){
				  $result["controller"] = "Album";
				  $result["action"] = "afficherAlFromNote";
				  $result["params"]["post"]= $_POST;
			  }
				if ((count($parts) == 4 ) && ($parts[1] == "supprimerCommentaire")) {
					$result["controller"] = "Album";
					$result["action"] = "supprimerCommentaire";
					$result["params"]["idC"] = $parts[2];
					$result["params"]["idAl"] = $parts[3];
				}
				
			  //
			 if ((count($parts) == 2) && ($parts[1] == "ajouterAlbum")) {
			 $result["controller"] = "Album";
			 $result["action"] = "ajouterAlbum";
			}
			if ((count($parts) == 2) && ($parts[1] == "envoyerAlbum")) {
			 $result["controller"] = "Album";
			 $result["action"] = "envoyerAlbum";
			 $result["params"]["post"]= $_POST;
			 
			}
			}
			  //
			if($parts[0] == "inscription")  {
			  if (count($parts) == 1){
				  $result["controller"] = "Inscription";
				  $result['action'] = "Inscription";
			  }
				if ((count($parts) == 2) && ($parts[1] == "verifierInscription")){
        	$result["controller"] = "Inscription";
          $result["action"] = "verifierInscription";
					//$result["params"]["slug"] = $parts[1];
			  }
			  //
		  }
			if($parts[0] == "connexion")  {
			  if (count($parts) == 1){
				  $result["controller"] = "Connexion";
				  $result['action'] = "connexion";
			  }
				if ((count($parts) == 2) && ($parts[1] == "verifierConnexion")){
        	$result["controller"] = "Connexion";
          $result["action"] = "verifierConnexion";         
			  }
			  //
		  }
			if($parts[0] == "deconnexion") {
				if (count($parts) == 1){
					$result["controller"] = "Connexion";
					$result['action'] = "deconnexion";
				}
			}
			
			if($parts[0] == "administrateur")  {
			  if (count($parts) == 2 && $parts[1] == "inscription"){
				  $result["controller"] = "Administrateur";
				  $result['action'] = "afficherInscription";
			  }
				
				if (count($parts) == 2 && $parts[1] == "commentaire"){
				  $result["controller"] = "Administrateur";
				  $result['action'] = "afficherCommentaire";
			  }
				
				if ((count($parts) == 3 ) && ($parts[0] == "administrateur") && ($parts[1] == "ajouterUtilisateur")) {
					$result["controller"] = "Administrateur";
					$result["action"] = "ajouterUtilisateur";
					$result["params"]["pseudo"] = $parts[2];
				}
				
				if ((count($parts) == 3 ) && ($parts[0] == "administrateur") && ($parts[1] == "refuserUtilisateur")) {
					$result["controller"] = "Administrateur";
					$result["action"] = "refuserUtilisateur";
					$result["params"]["pseudo"] = $parts[2];
				}
				
				if ((count($parts) == 3 ) && ($parts[0] == "administrateur") && ($parts[1] == "supprimerCommentaire")) {
					$result["controller"] = "Administrateur";
					$result["action"] = "supprimerCommentaire";
					$result["params"]["idC"] = $parts[2];
				}
			  //
		  }
	  }
	  return $result;
   }
}
?>