<?php

class Kernel {
	public static function autoload($class) {
		if(file_exists(ROOT."/app/kernel/$class.php"))
			require_once(ROOT."/app/kernel/$class.php");
		else if(file_exists(ROOT."/app/controller/$class.php"))
			require_once(ROOT."/app/controller/$class.php");
		else if(file_exists(ROOT."/app/model/$class.php"))
			require_once(ROOT."/app/model/$class.php");
	}



	public static function run() {
		// Autoload des classes
		spl_autoload_register('Kernel::autoload');

		// Analyser la requete
		$query = isset($_GET["query"]) ? $_GET["query"] : "";
		$route = Router::analyze( $query );

		// Instancier le controleur et
		// executer l'action
		$class = $route["controller"]."Controller";
		if(class_exists($class)) {

			$controller = new $class ($route);
			$method = array($controller, $route["action"]);
			if( is_callable( $method ))
				call_user_func($method);
		}
		// Gestion des erreurs
	}

	public static function getBaseUrl(){
		$uri = $_SERVER['REQUEST_URI'];
		if ($_SERVER['QUERY_STRING']!==""){
			$query = str_replace("query=","",$_SERVER['QUERY_STRING']);
			if (($pos = strrpos($uri,$query))){
				return rtrim(substr($uri,0,$pos),"/"); 
			}
			else return "/";
		}
		else
		{
			return rtrim($uri,"/");;
		}
	}
}
