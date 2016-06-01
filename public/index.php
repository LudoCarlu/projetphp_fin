<?php

// Ce fichier est le point d'entrée unique du projet
// La requête client se trouve dans le paramètre query
//
// echo $_GET["query"]; die();
//

define("ROOT", realpath(__dir__."/.."));
require_once(ROOT . "/app/kernel/Kernel.php");
define("BASE_URL",Kernel::getBaseUrl());

Kernel::run();
?>
