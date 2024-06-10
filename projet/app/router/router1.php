
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerPatrimoine.php');
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerClient.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) { //rajouter des arguments en fonction de si on est client ou admin ?
 case "banqueReadAll" :
 case "banqueCreate" :
 case "banqueCreated" :
 case "banqueReadId" :
 case "banqueReadComptes" :
 case "clientReadAll" :
 case "adminReadAll" :
 case "compteReadAll" :
  ControllerAdministrateur::$action();
  break;
// case "banqueReadAll" :
// case "banqueCreate" :
// case "banqueCreated" :
// case "banqueReadId" :
// case "banqueReadComptes" :
//  ControllerBanque::$action();
//  break;
 case "producteurReadAll" :
  ControllerClient::$action();
  break;

 // Tache par défaut
 default:
  $action = "patrimoineAccueil";
  ControllerPatrimoine::$action();
}
?>
<!-- ----- Fin Router1 -->

