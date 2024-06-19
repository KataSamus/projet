
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerPatrimoine.php');
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerClient.php');
require ('../controller/ControllerConnexion.php');


// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
// 
// Ancienne méthode
//$action = htmlspecialchars($param["action"]);

$action = $param["action"];

unset($param["action"]);

$args = $param;

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
 case "residenceReadAll" :
  ControllerAdministrateur::$action($args);
  break;
// case "banqueReadAll" :
// case "banqueCreate" :
// case "banqueCreated" :
// case "banqueReadId" :
// case "banqueReadComptes" :
//  ControllerBanque::$action();
//  break;
 case "clientReadAllAccounts" :
 case "compteShowTransfertForm" :
 case "compteTransfered" :
 case "compteCreate" :
 case "compteCreated" :
 case "clientReadAllResidences" :
 case "clientReadPatrimoine" :
 case "clientShowResidenceSelect" :
  ControllerClient::$action();
  break;
 case "Login" :
 case "Loged" :
 case "AccountCreate" :
 case "AccountCreated" :
 case "Logout" :
  ControllerConnexion::$action();
  break;

 // Tache par défaut
 default:
  $action = "patrimoineAccueil";
  ControllerPatrimoine::$action($args);
  break;
}
?>
<!-- ----- Fin Router1 -->

