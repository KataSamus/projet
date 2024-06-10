
<!-- ----- debut ControllerBanque -->
<?php

// POUR LE MOMENT CE CONTROLLEUR NE SERT A RIEN

require_once '../model/ModelPersonne.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';

class ControllerBanque {

 // --- Liste des banques
 public static function banqueReadAll() {
  $results = ModelBanque::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewAll.php';
  if (DEBUG){
    echo ("ControllerAdministrateur : banqueReadAll : vue = $vue");
  }
  require ($vue);
 }

// Affiche le formulaire de creation d'un producteur
 public static function banqueCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewInsert.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour récupérer les informations de la nouvelle banque
 // La clé est gérée par le systeme et pas par l'internaute
 public static function banqueCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelBanque::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['pays']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewInserted.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour sélectionner une banque qui existe
 public static function banqueReadId() {
  $results = ModelBanque::getAll();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewId.php';
  require ($vue);
 }
 
 // Affiche les comptes d'une banque en particulier (id)
 public static function banqueReadComptes() {
  $banque_id = $_GET['id'];
  $results = ModelBanque::getComptes($banque_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewAllComptes.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerBanque -->


